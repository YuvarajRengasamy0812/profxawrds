<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Nomination;
use App\Models\NominationGroup;
use App\Http\Requests;
use App\Models\WebmasterSection;
use Auth;
use File;
use Helper;
use Illuminate\Config;
use Illuminate\Http\Request;
use Redirect;

class NominationController extends Controller
{
//   public function store(Request $request)
// {
//     // Validate inputs
//     $request->validate([
//         'email' => 'nullable|email',
//         'confirm_email' => 'nullable|email|same:email',
//     ]);

//     try {
//         // Create nomination
//         $nomination = new Nomination();
//         $nomination->company       = strip_tags($request->company);
//         $nomination->contact       = strip_tags($request->contact);
//         $nomination->jobtitle      = strip_tags($request->jobtitle);
//         $nomination->email         = strip_tags($request->email);
//         $nomination->confirm_email = strip_tags($request->confirm_email);
//         $nomination->phone         = $request->phone;
//         $nomination->country       = strip_tags($request->country);
//         $nomination->description   = $request->description;
//         $nomination->statement     = $request->statement;
//         $nomination->category      = $request->category;
//         $nomination->consent1      = $request->has('consent1');
//         $nomination->consent2      = $request->has('consent2');

//         if($nomination->save()){
//             // Success redirect
//            return redirect()->back()
//     ->with('success', 'Nomination submitted successfully.');
//         } else {
//             // Failure redirect
//             return redirect()->back()
//                              ->with('error', 'Failed to submit nomination. Please try again.');
//         }

//     } catch (\Exception $e) {
//         // Exception redirect
//         return redirect()->back()
//                          ->with('error', 'An error occurred: ' . $e->getMessage());
//     }
// }

public function store(Request $request)
{
    $request->validate([
        // 'company'       => 'required|string|max:255',
        // 'contact'       => 'required|string|max:255',
        'email'         => 'nullable|email',
        'confirm_email' => 'nullable|email|same:email',
    ]);

    try {
        Nomination::create([
            'company'       => strip_tags($request->company),
            'contact'       => strip_tags($request->contact),
            'jobtitle'      => strip_tags($request->jobtitle),
            'email'         => strip_tags($request->email),
            'confirm_email' => strip_tags($request->confirm_email),
            'phone'         => $request->phone,
            'country'       => strip_tags($request->country),
            'description'   => $request->description,
            'statement'     => $request->statement,
            'category'      => $request->category,
            'subcategory'   => $request->subcategory,
            'consent1'      => $request->has('consent1'),
            'consent2'      => $request->has('consent2'),
        ]);

        return redirect()->back()
            ->with('success', 'Nomination submitted successfully.');

    } catch (\Exception $e) {
        return redirect()->back()
            ->with('error', 'An error occurred: ' . $e->getMessage());
    }
}
}