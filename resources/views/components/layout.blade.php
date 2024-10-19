<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900 flex flex-col min-h-screen">

   <!-- Navbar -->
   <nav id="navbar" class="bg-gray-800 shadow-md text-white">
    <div id="logonav" class="flex items-center p-4 max-w-screen-xl mx-auto">
        <!-- Logo -->
        <img src="{{ Vite::asset('resources/assets/cropped-logo UNEED-IT.png') }}" alt="Logo" class="h-12 mr-8">
        
        <!-- Navigation Links -->
<div id="logoptions" class="flex-grow flex items-center justify-center space-x-4 md:space-x-8">
    <ul class="flex items-center space-x-4 md:space-x-8">
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('home') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Home</a>
        </li>
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('OverOns') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Over ons</a>
        </li>
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('service') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Service</a>
        </li>
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('zakelijk') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Zakelijk</a>
        </li>
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('faq') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Faq</a>
        </li>
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('Bezorgdiensten') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Bezorgdiensten</a>
        </li>
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('account') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Account</a>
        </li>

        <!-- User Dropdown -->
        @if(auth()->check())
        <li class="relative text-gray-300 hover:text-white">
            <button onclick="toggleDropdown()" class="py-2 px-4 hover:bg-gray-700 rounded transition">
                {{ auth()->user()->name }} ▼
            </button>
            <ul id="dropdownMenu" class="hidden absolute right-0 mt-2 bg-gray-800 text-white rounded shadow-lg">
                <li class="py-1">
                    <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="block px-4 py-2 hover:bg-gray-700">Log uit</button>
                </li>
            </ul>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
        @else
        <li class="text-gray-300 hover:text-white">
            <a href="{{ url('Inloggen') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Inloggen</a>
        </li>
        @endif
    </ul>
</div>

</nav>

   <!-- Main Content -->
   <main class="flex-1 p-4">
       @yield('content')
   </main>

   <!-- Footer -->
   <footer id="footer" class="bg-gray-200 text-gray-800 py-6 mt-auto">
       <div class="container mx-auto flex justify-around space-x-6">
           <div id="address" class="flex flex-col items-center space-y-2">
               <img src="{{ Vite::asset('resources/assets/location.png') }}" alt="Location" class="h-8">
               <p class="text-sm">ZUIDBAAN 514, 2841MD</p>
               <p class="text-sm">MOORDRECHT</p>
           </div>
           <div id="telefoonnummer" class="flex flex-col items-center space-y-2">
               <img src="{{ Vite::asset('resources/assets/phone.png') }}" alt="Phone" class="h-8">
               <p class="text-sm">+316 30 985 409 SERVICENUMMER</p>
               <p class="text-sm">+3118 28 202 18 KANTOOR</p>
               <p class="text-sm">BEREIKBAAR VAN 09:00-18:00</p>
           </div>
           <div id="tijd" class="flex flex-col items-center space-y-2">
               <img src="{{ Vite::asset('resources/assets/clock.png') }}" alt="Clock" class="h-8">
               <p class="text-sm">MA T/M VRIJ, 09:00 - 23:00</p>
               <p class="text-sm">TELEFONISCH BEREIKBAAR</p>
               <p class="text-sm">VOOR ABONNEMENTHOUDERS</p>
           </div>
       </div>
   </footer>
   
</body>
</html>
