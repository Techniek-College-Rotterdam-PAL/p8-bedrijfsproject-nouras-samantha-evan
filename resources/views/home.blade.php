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
