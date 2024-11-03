@extends('components.layout')

@section('content')
<div class="container">
    <h1>Repair Request</h1>
    <form action="{{ route('repair.request.submit') }}" method="POST">
        @csrf

        <!-- Step 1: Select Device Type -->
        <div class="form-group">
            <label for="device_type_id">Select Device Type</label>
            <select id="device_type_id" name="device_type_id" class="form-control" required>
                <option value="" disabled selected>Select a device type</option>
                @foreach($deviceTypes as $deviceType)
                    <option value="{{ $deviceType->id }}">{{ $deviceType->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Step 2: Select Device Model -->
        <div class="form-group">
            <label for="device_model_id">Select Device Model</label>
            <select id="device_model_id" name="device_model_id" class="form-control" required>
                <option value="" disabled selected>Select a model</option>
                @foreach($deviceModels as $deviceModel)
                    <option value="{{ $deviceModel->id }}">{{ $deviceModel->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Step 3: Select Repair Types -->
        <div class="form-group">
            <label for="repair_types">Select Repair Types</label>
            <select id="repair_types" name="repair_types[]" class="form-control" multiple required>
                @foreach($repairTypes as $repairType)
                    <option value="{{ $repairType->id }}">{{ $repairType->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- User Details -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit Repair Request</button>
    </form>
</div>
@endsection
