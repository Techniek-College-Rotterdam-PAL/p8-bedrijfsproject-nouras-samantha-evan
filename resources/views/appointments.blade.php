@extends('components.layout')

@section('content')
<body>
    <h1>Book Your Appointment</h1>

    <form id="appointmentForm">
        @csrf
        <label for="date">Appointment Date:</label>
        <input type="date" name="date" id="date" required>

        <label for="time">Appointment Time:</label>
        <input type="time" name="time" id="time" required>

        <button type="submit">Book Appointment</button>
    </form>

    <div id="message" style="color: red; display: none;">
        You must be logged in to book an appointment.
    </div>
@endsection
