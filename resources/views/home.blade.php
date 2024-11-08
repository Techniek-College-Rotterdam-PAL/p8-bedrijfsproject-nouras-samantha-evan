@extends('components.layout')

@section('content')

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
                        <h4>Laat een review achter</h4>
                        <form action="{{ route('reviews.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea name="content" class="form-control" placeholder="Schrijf je review..." required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <select name="rating" class="form-control" required>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Verstuur Review</button>
                        </form>

                        <h4 class="mt-4">Alle reviews</h4>
                        @foreach ($reviews as $review)
                            <div class="border p-3 mb-3">
                                <p><strong>{{ $review->user->name }}:</strong> {{ $review->content }}</p>
                                <p>Rating: {{ $review->rating }}/5</p>
                                @if ($review->user_id == Auth::id())
                                    <form action="{{ route('reviews.destroy', $review) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Verwijder</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
