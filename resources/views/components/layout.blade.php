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
                        <a href="{{ url('OverOns') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Over
                            ons</a>
                    </li>
                    <li class="text-gray-300 hover:text-white">
                        <a href="{{ url('service') }}"
                            class="py-2 px-4 hover:bg-gray-700 rounded transition">Service</a>
                    </li>

                    </li>
                    <li class="text-gray-300 hover:text-white">
                        <a href="{{ url('faq') }}" class="py-2 px-4 hover:bg-gray-700 rounded transition">Faq</a>
                    </li>

                    <li class="text-gray-300 hover:text-white">
                        <a href="{{ route('repair.request') }}"
                            class="py-2 px-4 hover:bg-gray-700 rounded transition">qugifajkhb</a>
                    </li>
                    @if(auth()->check())
                        <li class="relative text-gray-300 hover:text-white">
                            <button onclick="toggleDropdown()" class="py-2 px-4 hover:bg-gray-700 rounded transition">
                                {{ auth()->user()->name }} ▼
                            </button>
                            <ul id="dropdownMenu"
                                class="hidden absolute right-0 mt-2 bg-gray-800 text-white rounded shadow-lg">
                                <!-- User Profile -->
                                <li class="py-1 px-4 border-b border-gray-700">
                                    <p class="text-sm font-semibold">{{ auth()->user()->name }}</p>
                                    <p class="text-sm">{{ auth()->user()->email }}</p>
                                </li>
                                <!-- Admin Specific Links -->
                                @if(auth()->check() && auth()->user()->role && auth()->user()->role->name === 'admin')
                                    <li class="py-1">
                                        <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 hover:bg-gray-700">Admin
                                            Dashboard</a>
                                    </li>
                                @endif
                                <!-- Edit Profile -->
                                <li class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-gray-700">Edit
                                        Profile</a>
                                </li>
                                <!-- Logout Button -->
                                <li class="py-1">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">
                                            Log uit!
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="text-gray-300 hover:text-gray-100">
                            <a href="{{ url('Inloggen') }}"
                                class="py-2 px-4 hover:bg-gray-700 rounded transition">Inloggen</a>
                        </li>
                    @endif

                </ul>
                </li>


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

            </div>
            <div id="tijd" class="flex flex-col items-center space-y-2">
                <img src="{{ Vite::asset('resources/assets/clock.png') }}" alt="Clock" class="h-8">
                <p class="text-sm">MA T/M VRIJ, 10:00 - 17:30</p>
                <p class="text-sm">TELEFONISCH BEREIKBAAR</p>
                <p class="text-sm">VOOR ABONNEMENTHOUDERS</p>
            </div>
        </div>
    </footer>

</body>

</html>