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
    // --------------------------- Dashboard Methods ---------------------------

    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Fetch data for the dashboard
        $repairRequestsCount = RepairRequest::count();
        $usersCount = User::count();
        $deviceModelsCount = DeviceModel::count();

        // Get recent repair requests
        $recentRepairRequests = RepairRequest::with('user', 'DeviceModel')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();


        return view('admin.dashboard', compact(
            'repairRequestsCount',
            'usersCount',
            'deviceModelsCount',
            'recentRepairRequests'
        ));
    }

    // --------------------------- Repair Request Methods ---------------------------

    /**
     * View all repair requests.
     *
     * @return \Illuminate\View\View
     */
    public function viewRepairRequests()
    {
        // Fetch all repair requests with related data
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
        // Validate the status input
        $request->validate([
            'status' => 'required|string|in:in behandeling,voltooid',
        ]);

        // Find the repair request and update status
        $repairRequest = RepairRequest::findOrFail($id);
        $repairRequest->status = $request->status;
        $repairRequest->save();

        return redirect()->route('admin.repairRequests')->with('success', 'Repair request status updated successfully.');
    }

    /**
     * Delete a repair request.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteRepairRequest($id)
    {
        // Find the repair request and delete
        $repairRequest = RepairRequest::findOrFail($id);
        $repairRequest->delete();

        return redirect()->route('admin.repairRequests')->with('success', 'Repair request deleted successfully.');
    }

    public function repairRequests(Request $request)
    {
        // Initialize query
        $query = RepairRequest::with('deviceModel');

        // Check if 'id' is provided, and search for an exact match
        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        // Check if 'name' is provided, and search for an exact match
        if ($request->filled('name')) {
            $query->where('name', $request->name);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Fetch the filtered results
        $repairRequests = $query->get();

        return view('admin.repairRequests', compact('repairRequests'));
    }

    // --------------------------- User Management Methods ---------------------------

    /**
     * Manage all users.
     *
     * @return \Illuminate\View\View
     */
    public function manageUsers(Request $request)
    {
        // Search for users based on email query (if provided)
        $query = User::query();
        if ($request->filled('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        // Get all users and roles
        $users = $query->get();
        $roles = Role::all();

        return view('admin.manageUsers', compact('users', 'roles'));
    }

    /**
     * Update the role of a user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateUserRole(Request $request, $id)
    {
        // Validate the role input
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        // Find user and update their role
        $user = User::findOrFail($id);
        $user->role_id = $request->role_id;
        $user->save();

        return redirect()->route('admin.manageUsers')->with('success', 'User role updated successfully.');
    }

    /**
     * Delete a user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteUser($id)
    {
        // Find the user and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageUsers')->with('success', 'User deleted successfully.');
    }

    // --------------------------- Device Model Methods ---------------------------
    public function viewDeviceModels()
    {
        // Fetch all device models along with their device types for listing
        $deviceModels = DeviceModel::with('deviceType')->get();

        // Fetch all device types for the dropdown in the create form
        $deviceTypes = DeviceType::all();

        return view('admin.deviceModels', compact('deviceModels', 'deviceTypes'));
    }

    public function storeDeviceModel(Request $request)
    {
        // Validate the input data
        $request->validate([
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:device_types,id',
        ]);

        // Create a new device model
        DeviceModel::create([
            'name' => $request->name,
            'type_id' => $request->type_id,
        ]);

        return redirect()->route('admin.deviceModels')->with('success', 'Device Model created successfully!');
    }

    public function deleteDeviceModel($id)
    {
        // Find and delete the specified device model
        $deviceModel = DeviceModel::findOrFail($id);
        $deviceModel->delete();

        return redirect()->route('admin.deviceModels')->with('success', 'Device model deleted successfully.');
    }
}
