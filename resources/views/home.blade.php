@extends('layouts.app')
@vite(['resources/js/dashboard.js'])
@section('content')
    <script type="text/javascript" src="{{asset('assets/dashboard.js') }}"></script>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Bienvenue sur le Tableau de bord') }}</div>
{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    --}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</div>


    <div class="row my-2">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Etat du bateau - ' ) .$ship->averageCondition().'%'  }}</div>
                <div class="card-body">
                    <canvas id="chBar" data-parts="{{$ship->parts->toJson()}}"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">

                </div>
                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
@endsection
