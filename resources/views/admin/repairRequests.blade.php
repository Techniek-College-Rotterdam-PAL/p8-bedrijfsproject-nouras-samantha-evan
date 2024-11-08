@extends('components.layout')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair Requests</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded shadow-md">
        <h1 class="text-2xl font-bold mb-4">Repair Requests</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <!-- Filter/Search Bar -->
        <form action="{{ route('admin.repairRequests') }}" method="GET" class="mb-4">
            <div class="flex items-center space-x-4">
                <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}"
                    class="w-1/3 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                <input type="number" name="id" placeholder="Search by ID" value="{{ request('id') }}"
                    class="w-1/3 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

                <select name="status"
                    class="w-1/3 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Filter by Status</option>
                    <option value="in behandeling" {{ request('status') == 'in behandeling' ? 'selected' : '' }}>In
                        Behandeling</option>
                    <option value="voltooid" {{ request('status') == 'voltooid' ? 'selected' : '' }}>Voltooid</option>
                </select>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Search</button>
            </div>
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border-b border-gray-300 text-left">ID</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Name</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Device Model</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Status</th>
                        <th class="py-2 px-4 border-b border-gray-300 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($repairRequests as $request)
                        <tr class="hover:bg-gray-100">
                            <td class="py-2 px-4 border-b border-gray-300">{{ $request->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $request->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $request->deviceModel->name ?? 'N/A' }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">{{ $request->status }}</td>
                            <td class="py-2 px-4 border-b border-gray-300">
                                <form action="{{ route('admin.updateRepairRequestStatus', $request->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" required class="border border-gray-300 rounded p-1">
                                        <option value="in behandeling" {{ $request->status == 'in behandeling' ? 'selected' : '' }}>In Behandeling</option>
                                        <option value="voltooid" {{ $request->status == 'voltooid' ? 'selected' : '' }}>
                                            Voltooid</option>
                                    </select>
                                    <button type="submit"
                                        class="ml-2 bg-blue-500 text-white rounded px-3 py-1">Update</button>
                                </form>

                                <form action="{{ route('admin.deleteRepairRequest', $request->id) }}" method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this repair request?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="ml-2 bg-red-500 text-white rounded px-3 py-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
@endsection