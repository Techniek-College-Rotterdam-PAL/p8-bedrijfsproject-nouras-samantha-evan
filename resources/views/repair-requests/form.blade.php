@extends('components.layout')

@section('content')
<div class="container mx-auto max-w-4xl py-12">
    <h1 class="text-3xl font-bold text-center mb-8">Repair Request</h1>

    <form action="{{ route('repair.request.submit') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @csrf

        <!-- Device Information Section -->
        <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-indigo-700">Device Information</h2>
            
            <!-- Device Type -->
            <div class="mb-4">
                <label for="device_type_id" class="block text-gray-700 font-semibold">Device Type</label>
                <select id="device_type_id" name="device_type_id" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                    <option value="" disabled selected>Select a device type</option>
                    @foreach($deviceTypes as $deviceType)
                        <option value="{{ $deviceType->id }}">{{ $deviceType->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Device Model -->
            <div class="mb-4">
                <label for="device_model_id" class="block text-gray-700 font-semibold">Device Model</label>
                <select id="device_model_id" name="device_model_id" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
                    <option value="" disabled selected>Select a model</option>
                    @foreach($deviceModels as $deviceModel)
                        <option value="{{ $deviceModel->id }}">{{ $deviceModel->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Repair Types -->
            <div class="mb-4">
                <label for="repair_types" class="block text-gray-700 font-semibold">Repair Types</label>
                <select id="repair_types" name="repair_types[]" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" multiple required>
                    @foreach($repairTypes as $repairType)
                        <option value="{{ $repairType->id }}">{{ $repairType->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- User Information Section -->
        <div class="p-6 bg-white shadow-lg rounded-lg border border-gray-200">
            <h2 class="text-xl font-semibold mb-4 text-indigo-700">User Information</h2>
            
            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold">Name</label>
                <input type="text" name="name" id="name" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block text-gray-700 font-semibold">Phone</label>
                <input type="text" name="phone" id="phone" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" id="email" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold">Description</label>
                <textarea name="description" id="description" class="mt-2 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-400" rows="4"></textarea>
            </div>
        </div>

        <!-- Submit Button (Spanning both columns) -->
        <div class="md:col-span-2 text-center">
            <button type="submit" class="bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition focus:outline-none focus:ring-2 focus:ring-indigo-400">
                Submit Repair Request
            </button>
        </div>
    </form>
</div>
@endsection
