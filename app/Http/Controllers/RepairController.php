<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function showPhoneRepairForm()
    {
        return view('phone_repair'); // Make sure you have a phone_repair.blade.php view
    }

    public function showLaptopRepairForm()
    {
        return view('laptop_repair');
    }
    public function submitPhoneRepair(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'device' => 'required|in:iphone,samsung,nokia', // Specify allowed devices
            'issue' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'address' => 'required|string|max:255', // Ensure to add this for address - --- --- Add other address fields if needed
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
    public function submitLaptopRepair(Request $request)
    {
        // Validation rules
        $validated = $request->validate([
            'device' => 'required|in:windows,mac',
            'issue' => 'required|string|max:1000',
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'address' => 'required|string|max:255',
        ]);

        // Save the repair request
        // LaptopRepair::create($validated);

        // If a warranty invoice is requested, generate one for laptops only
        // if ($request->has('warranty_invoice')) {
        //     // Logic to generate and store the warranty invoice
        // }

        return redirect()->back()->with('message', 'Laptop reparatieverzoek verzonden!');
    }

}
