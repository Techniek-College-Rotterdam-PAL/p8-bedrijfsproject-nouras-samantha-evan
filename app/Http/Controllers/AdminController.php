<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RepairRequest;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // If you want to include all repair requests with related data on the dashboard
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
        // Eager-load related data to optimize performance
        $repairRequests = RepairRequest::with('user', 'deviceModel', 'repairTypes')->get();

        // Debugging: Check if repair requests have names
        // foreach ($repairRequests as $request) {
        //     dd($request->name); // This will output the name of each request
        // }

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
     * Manage all users (e.g., view or delete users).
     *
     * @return \Illuminate\View\View
     */
    public function manageUsers()
    {
        $users = User::all();

        return view('admin.manageUsers', compact('users'));
    }
}
