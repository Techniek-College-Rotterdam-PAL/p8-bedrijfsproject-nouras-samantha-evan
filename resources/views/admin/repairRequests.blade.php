@extends('components.layout')

@section('content')
<div class="container mx-auto p-6 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-4">Reparatieverzoeken
    </h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
    @endif

    <!-- Filter/Search Form -->
    <form action="{{ route('admin.repairRequests') }}" method="GET" class="mb-6">
        <div class="flex flex-wrap items-center gap-4">
            <input type="text" name="name" placeholder="Search by Name" value="{{ request('name') }}"
                class="w-1/4 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <input type="number" name="id" placeholder="Search by ID" value="{{ request('id') }}"
                class="w-1/4 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">

            <select name="status"
                class="w-1/4 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Filter op Status</option>
                <option value="in behandeling" {{ request('status') == 'in behandeling' ? 'selected' : '' }}>In
                    Behandeling</option>
                <option value="voltooid" {{ request('status') == 'voltooid' ? 'selected' : '' }}>Voltooid</option>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Zoeken</button>
            <a href="{{ route('admin.repairRequests') }}"
                class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Reset</a>
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
                @forelse ($repairRequests as $request)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $request->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $request->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $request->deviceModel->name ?? 'N/A' }}</td>
                        <td class="py-2 px-4 border-b">{{ $request->status }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('admin.updateRepairRequestStatus', $request->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PUT')
                                <select name="status" required class="border border-gray-300 rounded p-1">
                                    <option value="in behandeling" {{ $request->status == 'in behandeling' ? 'selected' : '' }}>In Behandeling</option>
                                    <option value="voltooid" {{ $request->status == 'voltooid' ? 'selected' : '' }}>Voltooid
                                    </option>
                                </select>
                                <button type="submit" class="ml-2 bg-blue-500 text-white rounded px-3 py-1">Update</button>
                            </form>

                            <form action="{{ route('admin.deleteRepairRequest', $request->id) }}" method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this repair request?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-2 bg-red-500 text-white rounded px-3 py-1">Verwijder</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Geen reparatieverzoeken gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection