<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\SponsorCategory;
use Auth;
use File;
use Helper;
use Illuminate\Http\Request;
use Redirect;

class SponsorsController extends Controller
{
    use DashboardView;

    private $uploadPath = "uploads/sponsors/";

    // Sponsor types: home = homepage sponsors section, event = /event page
    private $types = ['home', 'event'];

    // Runs before every action: make sure the sponsor tables exist (auto-created on first use)
    public function callAction($method, $parameters)
    {
        if (!Sponsor::ready()) {
            return redirect()->route('adminHome')
                ->with('errorMessage', 'Sponsor tables could not be created. Import core/database/sql/sponsors.sql in phpMyAdmin.');
        }

        return parent::callAction($method, $parameters);
    }

    private function checkPermission($permission)
    {
        if (!@Auth::user()->permissionsGroup->$permission) {
            return Redirect::to(route('NoPermission'))->send();
        }
    }

    private function cleanType($type)
    {
        return in_array($type, $this->types) ? $type : 'home';
    }

    // ---------------- Categories ----------------

    public function categories()
    {
        $Categories = SponsorCategory::withCount('sponsors')->orderBy('row_no')->orderBy('id')->get();

        return $this->dashboardView("dashboard.sponsors.categories", compact("Categories"));
    }

    public function categoryStore(Request $request)
    {
        $this->checkPermission('add_status');
        $this->validate($request, ['title' => 'required|max:255']);

        SponsorCategory::create([
            'title' => strip_tags($request->title),
            'row_no' => (int)$request->row_no ?: ((int)SponsorCategory::max('row_no') + 1),
            'status' => $request->status ? 1 : 0,
        ]);

        return redirect()->route('sponsorCategories')->with('doneMessage', __('backend.addDone'));
    }

    public function categoryUpdate(Request $request, $id)
    {
        $this->checkPermission('edit_status');
        $this->validate($request, ['title' => 'required|max:255']);

        $Category = SponsorCategory::findOrFail($id);
        $Category->title = strip_tags($request->title);
        $Category->row_no = (int)$request->row_no;
        $Category->status = $request->status ? 1 : 0;
        $Category->save();

        return redirect()->route('sponsorCategories')->with('doneMessage', __('backend.saveDone'));
    }

    public function categoryDestroy($id)
    {
        $this->checkPermission('delete_status');

        $Category = SponsorCategory::findOrFail($id);
        // Keep the sponsors, just detach them from the deleted category
        Sponsor::where('category_id', $Category->id)->update(['category_id' => null]);
        $Category->delete();

        return redirect()->route('sponsorCategories')->with('doneMessage', __('backend.deleteDone'));
    }

    // ---------------- Sponsors ----------------

    public function index(Request $request, $type = 'home')
    {
        $type = $this->cleanType($type);
        $Sponsors = Sponsor::with('category')->where('type', $type);
        if ($request->category_id != "") {
            $Sponsors->where('category_id', $request->category_id);
        }
        $Sponsors = $Sponsors->orderBy('category_id')->orderBy('row_no')->orderBy('id')->get();
        $Categories = SponsorCategory::orderBy('row_no')->orderBy('id')->get();

        return $this->dashboardView("dashboard.sponsors.list", compact("Sponsors", "Categories", "type"));
    }

    public function create($type = 'home')
    {
        $this->checkPermission('add_status');
        $type = $this->cleanType($type);
        $Sponsor = new Sponsor(['type' => $type, 'status' => 1]);
        $Categories = SponsorCategory::orderBy('row_no')->orderBy('id')->get();

        return $this->dashboardView("dashboard.sponsors.form", compact("Sponsor", "Categories", "type"));
    }

    public function store(Request $request, $type = 'home')
    {
        $this->checkPermission('add_status');
        $type = $this->cleanType($type);
        $this->validate($request, $this->rules($type, true));

        $Sponsor = new Sponsor;
        $Sponsor->type = $type;
        $this->fill($Sponsor, $request);
        if ($Sponsor->row_no < 1) {
            $Sponsor->row_no = (int)Sponsor::where('type', $type)->max('row_no') + 1;
        }
        $Sponsor->logo = $this->upload($request);
        $Sponsor->save();

        return redirect()->route('sponsors', $type)->with('doneMessage', __('backend.addDone'));
    }

    public function edit($id)
    {
        $this->checkPermission('edit_status');
        $Sponsor = Sponsor::findOrFail($id);
        $type = $Sponsor->type;
        $Categories = SponsorCategory::orderBy('row_no')->orderBy('id')->get();

        return $this->dashboardView("dashboard.sponsors.form", compact("Sponsor", "Categories", "type"));
    }

    public function update(Request $request, $id)
    {
        $this->checkPermission('edit_status');
        $Sponsor = Sponsor::findOrFail($id);
        $this->validate($request, $this->rules($Sponsor->type, false));

        $this->fill($Sponsor, $request);
        $newLogo = $this->upload($request);
        if ($newLogo != "") {
            $this->deleteLogo($Sponsor->logo);
            $Sponsor->logo = $newLogo;
        }
        $Sponsor->save();

        return redirect()->route('sponsors', $Sponsor->type)->with('doneMessage', __('backend.saveDone'));
    }

    public function destroy($id)
    {
        $this->checkPermission('delete_status');
        $Sponsor = Sponsor::findOrFail($id);
        $type = $Sponsor->type;
        $this->deleteLogo($Sponsor->logo);
        $Sponsor->delete();

        return redirect()->route('sponsors', $type)->with('doneMessage', __('backend.deleteDone'));
    }

    private function rules($type, $logoRequired)
    {
        $rules = [
            'name' => 'required|max:255',
            'link' => 'nullable|url|max:255',
            'logo' => ($logoRequired ? 'required|' : 'nullable|') . 'image|max:5120',
        ];
        if ($type == 'home') {
            $rules['category_id'] = 'required|exists:sponsor_categories,id';
        }

        return $rules;
    }

    private function fill(Sponsor $Sponsor, Request $request)
    {
        $Sponsor->name = strip_tags($request->name);
        $Sponsor->link = strip_tags($request->link);
        $Sponsor->category_id = $Sponsor->type == 'home' ? $request->category_id : null;
        $Sponsor->row_no = (int)$request->row_no;
        $Sponsor->status = $request->status ? 1 : 0;
    }

    private function upload(Request $request)
    {
        if (!$request->hasFile('logo')) {
            return "";
        }
        if (!File::isDirectory($this->uploadPath)) {
            File::makeDirectory($this->uploadPath, 0755, true);
        }
        $fileName = time() . rand(1111, 9999) . '.' . strtolower($request->file('logo')->getClientOriginalExtension());
        $request->file('logo')->move($this->uploadPath, $fileName);
        Helper::imageOptimize($this->uploadPath . $fileName);

        return $this->uploadPath . $fileName;
    }

    // Only delete files we uploaded, never the original theme assets
    private function deleteLogo($logo)
    {
        if ($logo != "" && str_starts_with($logo, $this->uploadPath)) {
            File::delete($logo);
        }
    }
}
