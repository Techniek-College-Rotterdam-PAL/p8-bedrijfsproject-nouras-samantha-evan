<?php

namespace App\Http\Controllers;

use App\Models\DeviceType;
use App\Models\DeviceModel;
use App\Models\RepairType;
use App\Models\RepairRequest;
use Illuminate\Http\Request;

class RepairRequestController extends Controller
{
    /**
     * Show the form to select device type, model, and repair types.
     *
     * @return \Illuminate\View\View
     */
    public function showForm()
    {
        // Ensure that device models are retrieved
        $deviceTypes = DeviceType::all();
        $deviceModels = DeviceModel::all(); // Retrieve all device models
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
            'repair_types' => 'required|array',
            'service_type' => 'required|string', // Validate service_type field
            'description' => 'nullable|string',
        ]);

        $repairRequest = RepairRequest::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'device_model_id' => $request->device_model_id,
            'description' => $request->description,
            'service_type' => $request->service_type, // Add service_type to creation data
        ]);

        $repairRequest->repairTypes()->attach($request->repair_types);

        return redirect()->route('repair-requests.success')->with('status', 'Repair request submitted successfully.');
    }
}
