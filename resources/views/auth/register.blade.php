@extends('layouts.app')

@section('content')
    <div class="container">
    <form class="">
        <section class="gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4">
                                    <h1>Créer un compte</h1>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row mt-3">
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="name" class="col-md-4 col-form-label">{{ __('Nom') }}</label>
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="firstname" class="col-md-4 col-form-label">{{ __('Prénom') }}</label>
                                                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
                                                @error('firstname')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="email" class="col-md-4 col-form-label">{{ __('Adresse email') }}</label>
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="pseudo" class="col-md-4 col-form-label">{{ __('Pseudo') }}</label>
                                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{ old('pseudo') }}" required autocomplete="pseudo" autofocus>
                                                @error('pseudo')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group form-control-lg col-md-12">
                                                <label for="physicalDescription" class="col-md-4 col-form-label">{{ __('Descritption physique') }}</label>
                                                <textarea id="physicalDescription" rows="4" type="physicalDescription" class="form-control @error('physicalDescription') is-invalid @enderror" name="physicalDescription"  required autocomplete="physicalDescription">{{ old('physicalDescription') }}</textarea>
                                                @error('physicalDescription')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="age" class="col-md-4 col-form-label">{{ __('Age') }}</label>
                                                <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required autocomplete="age">
                                                @error('age')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="pseudo" class="col-md-4 col-form-label">{{ __('Spécialité') }}</label>
                                                <select class="form-select" name="specialty">
                                                    @foreach(config('constants.users_specialty') as $key => $specialty)
                                                        <option value="{{$key}}">{{$specialty}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="password" class="col-md-4 col-form-label">{{ __('Mot de passe') }}</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                @error('password')
                                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                            <div class="form-group form-control-lg col-md-6">
                                                <label for="password-confirm" class="col-md-6 col-form-label">{{ __('Confirmer mot de passe') }}</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>
                                        <div class="row mt-5">
                                            <div class="">
                                                <button type="submit" class="btn btn-lg btn-primary">
                                                    {{ __('Créer un compte') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
        @if($errors->any())
            <div class="row collapse">
                <ul class="alert-box warning radius">
                    @foreach($errors->all() as $error)
                        <li> {{ $error }} </li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>

@endsection
