@extends('components.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @auth
                        <!-- Temporary alert for login success -->
                        <div id="login-alert" class="alert alert-success" role="alert">
                            {{ __('You are logged in!') }}
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actueel Nieuws</title>
    <style>
        /* Basis styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        h1 {
            font-weight: bold;
            font-size: 1.25rem;
        }
        
        /* Container voor centreren */
        .container {
            max-width: 1000px; /* Bepaalt de maximale breedte van de content */
            text-align: center;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Grid container */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }
        
        /* Grid items */
        .grid-item {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        /* H2 Styling - Maak de tekst vet */
        .grid-item h2 {
            font-weight: bold;
            font-size: 1.25rem;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Actueel nieuws</h1>
        <div class="grid-container">
            <!-- 3x3 Grid met Lorem Ipsum-tekst -->
            @for ($i = 0; $i < 9; $i++)
                <div class="grid-item">
                    <h2>Artikel {{ $i + 1 }}</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel gravida nisl.</p>
                </div>
            @endfor
        </div>
    </div>
</body>
</html>


@endsection


