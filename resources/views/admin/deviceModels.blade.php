@extends('components.layout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-8">Device Models</h1>

    @if (session('success'))
        <div class="alert alert-success bg-green-100 text-green-700 p-4 mb-6 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table of Device Models -->
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-gray-700">Device Type</th>
                <th class="px-4 py-2 text-left text-gray-700">Model Name</th>
                <th class="px-4 py-2 text-left text-gray-700">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deviceModels as $deviceModel)
                <tr>
                    <td class="px-4 py-2 border-t border-gray-300">{{ $deviceModel->deviceType->name }}</td>
                    <td class="px-4 py-2 border-t border-gray-300">{{ $deviceModel->name }}</td>
                    <td class="px-4 py-2 border-t border-gray-300">
                        <form action="{{ route('admin.deleteDeviceModel', $deviceModel->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this device model?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection