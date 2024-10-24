@extends('components.layout')

@section('content')
<div class="container mx-auto p-4"> <!-- Add some margin and padding to position it well -->
    <form action="{{ route('laptopRepair.submit') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf
        <h3 class="text-xl font-bold mb-4">Laptop Reparatie Verzoek</h3>

        <label for="device" class="block mb-2">Apparaat:</label>
        <select name="device" id="device" class="block w-full mb-4 p-2 border border-gray-300 rounded">
            <option value="macbook">MacBook</option>
            <option value="dell">Dell</option>
            <option value="hp">HP</option>
            <option value="lenovo">Lenovo</option>
            <!-- You can add more laptop brands here -->
        </select>

        <label for="issue" class="block mb-2">Probleem Beschrijving:</label>
        <textarea name="issue" id="issue" required class="block w-full mb-4 p-2 border border-gray-300 rounded"></textarea>

        <label for="email" class="block mb-2">Uw E-mail (optioneel, voor kopie van verzoek):</label>
        <input type="email" name="email" id="email" class="block w-full mb-4 p-2 border border-gray-300 rounded">

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Verzend Verzoek</button>
    </form>

    @if(session('success'))
        <div class="mt-4 p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
