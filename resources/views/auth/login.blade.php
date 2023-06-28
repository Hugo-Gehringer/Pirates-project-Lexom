@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <section class="gradient-custom">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                                            <div class="card-body p-5 text-center">
                                                <div class="mb-md-5 mt-md-4">
                                                    <h2 class="fw-bold mb-2 text-uppercase">Se connecter</h2>
                                                    <p class="text-white-50 mb-5">Veuillez saisir votre email et votre mot de passe</p>
                                                    <div class="form-outline form-white mb-4">
                                                        <label class="form-label" for="typeEmailX">Email</label>
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-outline form-white mb-4">
                                                        <label class="form-label" for="typePasswordX">Mot de passe</label>
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col-md-6 offset-md-4">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <label class="form-check-label" for="remember">
                                                                    {{ __('Remember Me') }}
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-outline form-white mb-4">
                                                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Connexion</button>
                                                    </div>
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                </div>
{{--                                                <p class=""><a href="{{ path('app_register') }}" class="text-white-50 fw-bold">Se créer un compte</a>--}}
{{--                                                </p>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </form>
    </div>
</div>
@endsection
