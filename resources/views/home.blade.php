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
@endsection
