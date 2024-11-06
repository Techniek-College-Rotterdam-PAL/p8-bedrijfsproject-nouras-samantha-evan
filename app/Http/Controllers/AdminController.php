<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\DeviceModel;
use App\Models\DeviceType;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $repairRequests = RepairRequest::with('user', 'deviceModel', 'repairTypes')->get();
        return view('admin.dashboard', compact('repairRequests'));
    }

    /**
     * View all repair requests.
     *
     * @return \Illuminate\View\View
     */
    public function viewRepairRequests()
    {
        $repairRequests = RepairRequest::with('user', 'deviceModel', 'repairTypes')->get();
        return view('admin.repairRequests', compact('repairRequests'));
    }

    /**
     * Update the status of a repair request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRepairRequestStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:in behandeling,voltooid',
        ]);

        $repairRequest = RepairRequest::findOrFail($id);
        $repairRequest->status = $request->status;
        $repairRequest->save();

        return redirect()->route('admin.repairRequests')->with('success', 'Repair request status updated successfully.');
    }

    /**
     * Manage all users.
     *
     * @return \Illuminate\View\View
     */
    public function manageUsers(Request $request)
    {
        $users = User::all();
        $query = User::query();

        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        $users = $query->get();
        $roles = Role::all(); // Fetch roles to pass to the view

        return view('admin.manageUsers', compact('users', 'roles'));
    }

    /**
     * Update user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserRole(Request $request, $id)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('admin.manageUsers')->with('success', 'User role updated successfully.');
    }
    public function createDeviceModel()
    {
        // Fetch device types to show in the dropdown
        $deviceTypes = DeviceType::all();
        $deviceModels = DeviceModel::with('deviceType')->get();

        return view('admin.createDeviceModel', compact('deviceTypes'));
    }

    // Handle the form submission to store a new device model
    public function storeDeviceModel(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:device_types,id'
        ]);

        // Create the device model
        DeviceModel::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);

        // Redirect back with success message
        return redirect()->route('admin.createDeviceModel')->with('success', 'Device Model created successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageUsers')->with('success', 'User deleted successfully.');
    }

    /**
     * Delete a device model.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteDeviceModel($id)
    {
        $deviceModel = DeviceModel::findOrFail($id);
        $deviceModel->delete();

        return redirect()->route('admin.viewDeviceModels')->with('success', 'Device model deleted successfully.');
    }

    /**
     * Delete a repair request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRepairRequest($id)
    {
        $repairRequest = RepairRequest::findOrFail($id);
        $repairRequest->delete();

        return redirect()->route('admin.repairRequests')->with('success', 'Repair request deleted successfully.');
    }


}
