@extends('components.layout')

@section('content')
    <div class="container mx-auto px-6 py-8">
        <h1 class="text-3xl font-semibold text-center text-gray-900 mb-8">Admin Dashboard</h1>

        <!-- Summary Stats -->
        <div class="grid grid-cols-3 gap-6 mb-8">
            <div class="bg-gradient-to-r from-green-500 to-green-400 p-6 rounded-lg text-center shadow-md">
                <h2 class="text-xl font-medium text-white">Total Repair Requests</h2>
                <p class="text-3xl font-bold text-white">{{ $repairRequestsCount }}</p>
            </div>
            <div class="bg-gradient-to-r from-blue-500 to-blue-400 p-6 rounded-lg text-center shadow-md">
                <h2 class="text-xl font-medium text-white">Total Users</h2>
                <p class="text-3xl font-bold text-white">{{ $usersCount }}</p>
            </div>
            <div class="bg-gradient-to-r from-yellow-500 to-yellow-400 p-6 rounded-lg text-center shadow-md">
                <h2 class="text-xl font-medium text-white">Device Models</h2>
                <p class="text-3xl font-bold text-white">{{ $deviceModelsCount }}</p>
            </div>
        </div>

        <!-- Recent Repair Requests -->
        <div class="mt-8">
            <h2 class="text-2xl font-semibold text-gray-900 mb-4">Recent Repair Requests</h2>
            <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <th class="px-6 py-3 text-left">User</th>
                        <th class="px-6 py-3 text-left">Device</th>
                        <th class="px-6 py-3 text-left">Status</th>
                        <th class="px-6 py-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentRepairRequests as $request)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800">{{ $request->user->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $request->deviceModel->name }}</td>
                            <td class="px-6 py-4 text-gray-800">{{ $request->status }}</td>
                            <td class="px-6 py-4 text-gray-600">{{ $request->created_at->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Quick Actions -->
        <div class="flex space-x-4 mt-8">
            <a href="{{ route('admin.deviceModels') }}" class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700 transition">Add Device Model</a>
            <a href="{{ route('admin.manageUsers') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">Manage Users</a>
            <a href="{{ route('admin.repairRequests') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700 transition">View All Repair Requests</a>
        </div>
    </div>
@endsection
