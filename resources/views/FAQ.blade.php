@extends('components.layout')

@section('content')

<div id="faq-section" class="max-w-2xl mx-auto my-8 p-6 bg-gray-800 text-white rounded-lg shadow-md">
    <h1 class="text-3xl font-bold text-center mb-6 text-gray-100">Frequently Asked Questions</h1>

    <div id="accordion-flush" class="space-y-4">
        <!-- First FAQ Item -->
        <h2 id="accordion-flush-heading-1">
            <button type="button" class="accordion-header flex items-center justify-between w-full py-4 font-medium text-gray-300 border-b border-gray-600 hover:bg-gray-700 rounded transition duration-300" data-target="#accordion-flush-body-1" aria-expanded="false" aria-controls="accordion-flush-body-1">
                <span>Lorem ipsum dolor sit amet?</span>
                <svg class="accordion-icon w-4 h-4 transform transition-transform duration-300 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-flush-body-1" class="accordion-content hidden">
            <div class="py-4 border-b border-gray-600">
                <p class="text-gray-400">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a eros ut nunc condimentum aliquet in eu velit. Integer interdum orci eget augue euismod, a ullamcorper ligula dictum.</p>
            </div>
        </div>

        <!-- Second FAQ Item -->
        <h2 id="accordion-flush-heading-2">
            <button type="button" class="accordion-header flex items-center justify-between w-full py-4 font-medium text-gray-300 border-b border-gray-600 hover:bg-gray-700 rounded transition duration-300" data-target="#accordion-flush-body-2" aria-expanded="false" aria-controls="accordion-flush-body-2">
                <span>Vestibulum consectetur lacus non libero lobortis?</span>
                <svg class="accordion-icon w-4 h-4 transform transition-transform duration-300 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-flush-body-2" class="accordion-content hidden">
            <div class="py-4 border-b border-gray-600">
                <p class="text-gray-400">Vestibulum consectetur lacus non libero lobortis, ac vulputate elit malesuada. Proin sit amet augue sit amet purus dignissim consequat. Integer in suscipit ligula, sed posuere erat.</p>
            </div>
        </div>

        <!-- Third FAQ Item -->
        <h2 id="accordion-flush-heading-3">
            <button type="button" class="accordion-header flex items-center justify-between w-full py-4 font-medium text-gray-300 border-b border-gray-600 hover:bg-gray-700 rounded transition duration-300" data-target="#accordion-flush-body-3" aria-expanded="false" aria-controls="accordion-flush-body-3">
                <span>Curabitur sit amet magna in mauris vehicula?</span>
                <svg class="accordion-icon w-4 h-4 transform transition-transform duration-300 text-gray-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                </svg>
            </button>
        </h2>
        <div id="accordion-flush-body-3" class="accordion-content hidden">
            <div class="py-4 border-b border-gray-600">
                <p class="text-gray-400">Curabitur sit amet magna in mauris vehicula gravida. Nullam pulvinar tortor nec turpis auctor, sed cursus justo ullamcorper. Praesent at mauris nec sapien commodo fermentum vel non nisl.</p>
            </div>
        </div>
    </div>
</div>



@endsection
