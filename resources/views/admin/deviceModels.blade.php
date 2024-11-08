@extends('components.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Apparaat modellen</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 text-green-700 p-4 mb-6 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form to create a new device model -->
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md mb-8">
        <h2 class="text-2xl font-medium text-gray-700 mb-4">Creeër een apparaat model</h2>
        <form action="{{ route('admin.storeDeviceModel') }}" method="POST" class="flex items-center space-x-4">
            @csrf
            <div class="flex-1">
                <label for="name" class="block text-gray-700 font-medium mb-2">Model Naam:</label>
                <input type="text" name="name" id="name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex-1">
                <label for="type_id" class="block text-gray-700 font-medium mb-2">Apparaat Type:</label>
                <select name="type_id" id="type_id" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Select a type</option>
                    @foreach ($deviceTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit"
                    class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200 mt-6">
                    Create Model
                </button>
            </div>
        </form>
    </div>

    <!-- Filter by device type -->
    <div class="mb-6">
        <label for="filter_type" class="block text-gray-700 font-medium mb-2">Filter bij Apparaat Type:</label>
        <select id="filter_type" onchange="filterDeviceModels()"
            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            <option value="">All</option>
            @foreach ($deviceTypes as $type)
                <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Table of Device Models -->
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-gray-700">Apparaat Type</th>
                <th class="px-4 py-2 text-left text-gray-700">Model Naam</th>
                <th class="px-4 py-2 text-left text-gray-700">Acties</th>
            </tr>
        </thead>
        <tbody id="deviceModelsTable">
            @foreach ($deviceModels as $deviceModel)
                <tr data-type="{{ $deviceModel->type_id }}">
                    <td class="px-4 py-2 border-t border-gray-300">
                        {{ $deviceModel->deviceType ? $deviceModel->deviceType->name : 'No Type Assigned' }}
                    </td>
                    <td class="px-4 py-2 border-t border-gray-300">{{ $deviceModel->name }}</td>
                    <td class="px-4 py-2 border-t border-gray-300">
                        <form action="{{ route('admin.deleteDeviceModel', $deviceModel->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this device model?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function filterDeviceModels() {
        const selectedType = document.getElementById('filter_type').value;
        const rows = document.querySelectorAll('#deviceModelsTable tr');

        rows.forEach(row => {
            const typeId = row.getAttribute('data-type');
            row.style.display = (selectedType === "" || typeId === selectedType) ? "" : "none";
        });
    }
</script>
@endsection