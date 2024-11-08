@extends('components.layout')

@section('content')
<body class="bg-gray-100 py-8">

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-semibold text-center text-gray-800 mb-6">Book Your Appointment</h1>

        <form id="appointmentForm" class="space-y-4">
            @csrf

            <div class="flex flex-col">
                <label for="date" class="font-medium text-gray-700">Afspraak datum:</label>
                <input type="date" name="date" id="date" class="border border-gray-300 rounded-md px-4 py-2" required>
            </div>

            <div class="flex flex-col">
                <label for="time" class="font-medium text-gray-700">Afspraak tijd:</label>
                <select name="time" id="time" class="border border-gray-300 rounded-md px-4 py-2" required>
                    <option value="" disabled selected>Selecteer tijd</option>
                    <!-- Time options will be populated here by JavaScript -->
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Maak een afspraak
            </button>
        </form>

        <div id="message" class="mt-4 text-red-500 text-center" style="display: none;">
            Je moet ingelogd zijn om een afspraak te maken.
        </div>
    </div>

</body>
@endsection
