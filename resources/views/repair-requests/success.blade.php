@extends('components.layout')

@section('content')
    <div class="container">
        <h1>Repair Request Submitted Successfully</h1>
        <p>Thank you, {{ $repairRequest->name }}. Here are the details of your request:</p>

        <ul>
            <li><strong>Name:</strong> {{ $repairRequest->name }}</li>
            <li><strong>Phone:</strong> {{ $repairRequest->phone }}</li>
            <li><strong>Email:</strong> {{ $repairRequest->email }}</li>
            <li><strong>Device Model:</strong> {{ $repairRequest->device_model_id }}</li>
            <li><strong>Device Type:</strong> {{ $repairRequest->device_type_id }}</li>
            <li><strong>Repair Types:</strong> 
                @foreach ($repairRequest->repairTypes as $type)
                    {{ $type->name }}
                @endforeach
            </li>
            <li><strong>Description:</strong> {{ $repairRequest->description }}</li>
        </ul>
    </div>
@endsection
