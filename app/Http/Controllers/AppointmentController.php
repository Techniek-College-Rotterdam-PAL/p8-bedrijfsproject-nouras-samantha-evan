<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Show the appointment booking form.
     */
    public function index()
    {
        return view('appointments'); // This assumes you’ll create a `appointments.blade.php` view
    }

    /**
     * Check if a specific date and time slot is available.
     */
    public function checkAvailability(Request $request)
    {
        $date = $request->input('date');
        $time = $request->input('time');

        $exists = Appointment::where('date', $date)
                             ->where('time', $time)
                             ->exists();

        return response()->json(['available' => !$exists]);
    }

    /**
     * Book an appointment.
     */
    public function book(Request $request)
{
    try {
        // Validate the request
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return validation errors as JSON
        return response()->json(['message' => $e->validator->errors()->first()], 400);
    }

    // Check if the date is a weekday (Monday to Friday)
    $date = \Carbon\Carbon::parse($request->date);
    if ($date->isWeekend()) {
        return response()->json(['message' => 'Appointments can only be booked from Monday to Friday.'], 400);
    }

    // Check if the time is between 10:00 and 17:00
    if ($request->time < '10:00' || $request->time > '17:00') {
        return response()->json(['message' => 'Appointments must be between 10:00 AM and 5:00 PM.'], 400);
    }

    // Check if the time slot is available, ensuring there is a 30-minute gap
    $existingAppointment = Appointment::where('date', $request->date)
                                      ->whereBetween('time', [
                                          \Carbon\Carbon::parse($request->time)->subMinutes(30)->format('H:i'),
                                          \Carbon\Carbon::parse($request->time)->addMinutes(30)->format('H:i')
                                      ])
                                      ->exists();

    if ($existingAppointment) {
        return response()->json(['message' => 'This time is already taken. Please select a different time.'], 409);
    }

    // Check if the user is logged in
    if (!Auth::check()) {
        return response()->json(['message' => 'You must be logged in to book an appointment'], 401);
    }

    // Book the appointment
    $appointment = Appointment::create([
        'user_id' => Auth::id(),
        'date' => $request->date,
        'time' => $request->time,
    ]);

    return response()->json(['appointment' => $appointment, 'message' => 'Appointment booked successfully'], 201);
}


}
