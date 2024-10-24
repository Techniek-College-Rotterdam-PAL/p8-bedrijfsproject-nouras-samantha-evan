<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function submitPhoneRepair(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'device' => 'required|in:iphone,samsung,nokia', // Exclude Chinese brands ??? 
            'issue' => 'required|string|max:1000',
            'email' => 'nullable|email',
        ]);

        // Save the repair request in the database (simplified example)
        // Repair::create($validated);

        // Optionally email the request if an email is provided
        // if ($request->has('email')) {
        //     Mail::raw('Uw reparatieverzoek: ' . $request->input('issue'), function($message) use ($request) {
        //         $message->to($request->input('email'))->subject('Reparatieverzoek Kopie');
        //     });
        // }

        return redirect()->back()->with('message', 'Verzoek verzonden!');
    }
}
