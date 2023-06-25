@extends("layouts.app")
@section('content')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <h1 class="mt-5 text-center">
        Bienvenue
    </h1>
    <h1 class="mt-5 text-center">
        @guest
            <span class="fw-bold">
                Vous devez être connecter pour accèder aux tableau de bord
            </span>

            <div class="row mt-5">
                @if (Route::has('login'))
                    <div class="col-md-6">
                        <a class="btn btn-lg btn-primary" href="{{ route('login') }}">{{ __('connecter') }}</a>
                    </div>
                @endif
                @if (Route::has('register'))
                    <div class="col-md-6">
                        <a class="btn btn-lg btn-primary" href="{{ route('register') }}">{{ __('Créer un compte') }}</a>
                    </div>
                @endif
            </div>
        @endguest
{{--        <a href="{{ path('app_contactform_new') }}" style="color: #059669">--}}
{{--            Lien vers le formulaire de contact--}}
{{--        </a>--}}
    </h1>
</div>@vite(['resources/js/app.js'])
</body>
</html>
@endsection

