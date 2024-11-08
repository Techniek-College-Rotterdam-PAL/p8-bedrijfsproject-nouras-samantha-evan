<?php

namespace App\Http\Controllers;

use App\Models\DeviceType;
use App\Models\DeviceModel;
use App\Models\RepairType;
use App\Models\RepairRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairRequestController extends Controller
{
    /**
     * Show the form to select device type, model, and repair types.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Retrieve necessary data
        $deviceTypes = DeviceType::all();
        $deviceModels = DeviceModel::all();
        $repairTypes = RepairType::all();

        // Pass all necessary data to the view
        return view('repair-requests.form', compact('deviceTypes', 'deviceModels', 'repairTypes'));
    }

    /**
     * Handle form submission with contact information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submitRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email',
            'device_model_id' => 'required|exists:device_models,id',
            'device_type_id' => 'required|exists:device_types,id',
            'repair_types' => 'required|array',
            'description' => 'nullable|string',
        ]);

        // Create repair request with logged-in user ID if available
        $repairRequest = RepairRequest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'device_model_id' => $request->device_model_id,
            'device_type_id' => $request->device_type_id,
            'description' => $request->description,
            'user_id' => Auth::id(), // Automatically sets user_id if a user is logged in
        ]);

        // Attach repair types to the repair request
        $repairRequest->repairTypes()->attach($request->repair_types);

        // Redirect with the repair request data
        return redirect()->route('repair.request.success')->with('repairRequest', $repairRequest);
    }

    /**
     * Display the success page.
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        // Retrieve the repair request data from the session
        $repairRequest = session('repairRequest');

        // Redirect back to the form if data is not present (in case of direct access)
        if (!$repairRequest) {
            return redirect()->route('repair.request');
        }

        return view('repair-requests.success', compact('repairRequest'));
    }
}
