@extends('layouts.app')
@vite(['resources/js/dashboard.js'])
@section('content')
    <script type="text/javascript" src="{{asset('assets/dashboard.js') }}"></script>
<div class="container">
    <div class="row justify-content-center my-3">
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
    <div class="row my-2">
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-center">{{ __('Etat du bateau - ' ) .$ship->averageCondition().'%'  }}</div>
                <canvas id="chBar" data-parts="{{$ship->parts->toJson()}}"style="position: relative; height:300vh; width:80vw"></canvas>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-center">
                    Liste des matelots
                </div>
                <div class="card-body">
                    <ul>
                        @foreach($ship->pirates as $pirate)
                            <li>
                                <h4>{{$pirate->firstname .' '.$pirate->name}}</h4>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-header text-center">
                    Liste des ressources
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="table-secondary">
                        <tr>
                            <th class="col-md-3">Nom</th>
                            <th class="col-md-3">Quantitée</th>
                            <th class="col-md-5">Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ship->ressources as $ressource)
                            <tr>
                                <td>{{ $ressource->name }}</td>
                                <td>{{ $ressource->quantity }}</td>
                                <td>
                                    {{ config('constants.ressources_type')[$ressource->type] }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
