@extends('components.layout')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Over ons</title>
    </head>

    <body class="bg-gray-100">
        <iframe src="https://www.google.com/maps/embed?pb=!3m2!1snl!2snl!4v1730803161571!5m2!1snl!2snl!6m8!1m7!1sCAoSLEFGMVFpcFB0ZGJwUV9mcHVIcXk5eUs5eXgzQnRZc0xiTHYwdWN1Q2F4Ym10!2m2!1d52.01632599379936!2d4.657777982187554!3f81.90842265904615!4f-6.605490052181139!5f0.7820865974627469" 
                width="100%" height="370" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <div class="max-w-screen-xl mx-auto p-4 mt-8 bg-white shadow-md rounded-lg flex flex-col md:flex-row items-center">
            <div class="flex-1 p-4">
                <h1 class="text-2xl font-bold mb-4">Over ons</h1>
                <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, sed. Deleniti, laborum! Omnis at expedita numquam vero quibusdam quam dignissimos! Quasi doloribus a deserunt necessitatibus eos? Dicta accusantium inventore dolorum? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem, sed. Deleniti, laborum! Omnis at expedita numquam vero quibusdam quam dignissimos! Quasi doloribus a deserunt necessitatibus eos? Dicta accusantium inventore dolorum?</p>
            </div>
            <div class="flex justify-center items-center p-4">
                <img src="{{ Vite::asset('resources/assets/owner-image.jpg') }}" alt="Owner of the Website" class="w-48 h-auto rounded-lg shadow-lg">
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto p-4 mt-8 bg-white shadow-md rounded-lg flex flex-col md:flex-row items-center">
        <div class="flex-1 p-4">
                <h1 class="text-1xl font-bold mb-1">Bezorgdiensten</h1>
                <p class="text-gray-700">Producten worden opgehaald en geleverd door UPS, DHL, HOMERR. </p>
            </div>
            </div>
    </body>

    </html>
@endsection
