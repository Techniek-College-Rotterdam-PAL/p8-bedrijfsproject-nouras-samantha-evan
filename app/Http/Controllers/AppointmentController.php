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
        $request->validate([
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        if (!Auth::check()) {
            return response()->json(['message' => 'You must be logged in to book an appointment'], 401);
        }

        // Check if the time slot is available
        $exists = Appointment::where('date', $request->date)
                             ->where('time', $request->time)
                             ->exists();

        if ($exists) {
            return response()->json(['message' => 'This slot is already taken'], 409);
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
