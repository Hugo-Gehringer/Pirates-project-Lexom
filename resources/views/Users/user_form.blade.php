@if (isset($user))
    <form method="POST" action="{{ route('user.update', $user) }}">
    @method('PATCH')
@else
    <form method="POST" action="{{ route('user.store') }}">
@endif
        <div class="row mt-3">
                @csrf
                <div class="form-group form-control-lg col-md-6">
                        <label for="name" class="col-md-4 col-form-label">{{ __('Nom') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($user) ? $user->name : old('name') }}" required  autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                </div>
                    <div class="form-group form-control-lg col-md-6">
                        <label for="firstname" class="col-md-4 col-form-label">{{ __('Prénom') }}</label>
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ isset($user) ? $user->firstname : old('firstname') }}" required  autofocus>
                        @error('firstname')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                <div class="row mt-3">
                    <div class="form-group form-control-lg col-md-6">
                        <label for="email" class="col-md-4 col-form-label">{{ __('Adresse email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{  isset($user) ? $user->email : old('email') }}" required >
                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <div class="form-group form-control-lg col-md-6">
                        <label for="pseudo" class="col-md-4 col-form-label">{{ __('Pseudo') }}</label>
                        <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror" name="pseudo" value="{{  isset($user) ? $user->pseudo : old('pseudo') }}" required  autofocus>
                        @error('pseudo')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group form-control-lg col-md-12">
                        <label for="physicalDescription" class="col-md-4 col-form-label">{{ __('Description physique') }}</label>
                        <textarea id="physicalDescription" rows="4" type="physicalDescription" class="form-control @error('physicalDescription') is-invalid @enderror" name="physicalDescription"  required>{{  isset($user) ? $user->physicalDescription : old('physicalDescription') }}</textarea>
                        @error('physicalDescription')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="form-group form-control-lg col-md-4">
                        <label for="age" class="col-md-4 col-form-label">{{ __('Age') }}</label>
                        <input id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" value="{{ isset($user) ? $user->age : old('age') }}" required >
                        @error('age')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                    <input id="ship_id" name="ship_id" type="hidden" value="{{$ship->id}}">
                    <div class="form-group form-control-lg col-md-4">
                        <label for="specialty" class="col-md-4 col-form-label">{{ __('Spécialité') }}</label>
                        <select id="specialty" class="form-select" name="specialty">
                            @foreach(config('constants.users_specialty') as $key => $specialty)
                                <option value="{{$key}}" {{ isset($user) && $user->specialty == $specialty ? 'selected' : '' }}>
                                    {{$specialty}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if (!isset($user))
                    <div class="row mt-3">
                        <div class="form-group form-control-lg col-md-6">
                            <label for="password" class="col-md-4 col-form-label">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{isset($user) ? $user->password : old('password')}}" required >
                            @error('password')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>
                        <div class="form-group form-control-lg col-md-6">
                            <label for="password-confirm" class="col-md-6 col-form-label">{{ __('Confirmer mot de passe') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                        </div>
                    </div>
                @endif
                <div class="row mt-5">
                    <div class="">
                        <button type="submit" class="btn btn-lg btn-primary">{{ __('Confirmer') }}</button>
                    </div>
                </div>
        </div>
    </form>
