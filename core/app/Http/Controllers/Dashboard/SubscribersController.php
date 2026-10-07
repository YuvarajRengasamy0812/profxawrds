<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Auth;
use Helper;
use Illuminate\Http\Request;
use Redirect;

// Newsletter subscribers = contacts saved in the newsletter contacts group by the footer form
class SubscribersController extends Controller
{
    use DashboardView;

    private function query(Request $request)
    {
        $query = Contact::where('group_id', Helper::GeneralWebmasterSettings("newsletter_contacts_group"));
        if ($request->q != "") {
            $query->where('email', 'like', '%' . $request->q . '%');
        }

        return $query;
    }

    public function index(Request $request)
    {
        $Subscribers = $this->query($request)->orderBy('id', 'desc')
            ->paginate(config('smartend.backend_pagination'))->withQueryString();

        return $this->dashboardView("dashboard.subscribers.list", compact("Subscribers"));
    }

    public function destroy($id)
    {
        if (!@Auth::user()->permissionsGroup->delete_status) {
            return Redirect::to(route('NoPermission'))->send();
        }
        Contact::where('group_id', Helper::GeneralWebmasterSettings("newsletter_contacts_group"))
            ->findOrFail($id)->delete();

        return redirect()->route('subscribers')->with('doneMessage', __('backend.deleteDone'));
    }

    public function export(Request $request)
    {
        $Subscribers = $this->query($request)->orderBy('id', 'desc')->get();

        return response()->streamDownload(function () use ($Subscribers) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['id', 'email', 'subscribed_at']);
            foreach ($Subscribers as $Subscriber) {
                fputcsv($out, [$Subscriber->id, $Subscriber->email, (string)$Subscriber->created_at]);
            }
            fclose($out);
        }, 'subscribers-' . date('Y-m-d') . '.csv', ['Content-Type' => 'text/csv']);
    }
}
