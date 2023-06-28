@extends('layouts.app')
@vite(['resources/js/dashboard.js'])
@section('content')
    <script type="text/javascript" src="{{asset('assets/dashboard.js') }}"></script>
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">{{ __('Bienvenue sur le Tableau de bord') }}</div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">{{ __('Etat du bateau - ' ) .$ship->averageCondition().'%'  }}</div>
                <div class="chart-container d-flex justify-content-center" style="height : 400px; ">
                    <canvas id="chBar" class="object-fit-contain" data-parts="{{$ship->parts->toJson()}}">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-2">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    Liste des matelots
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="table-secondary">
                        <tr>
                            <th class="col-md-5">Nom</th>
                            <th class="col-md-5">Spécialitée</th>
                            <th class="col-md-2">age</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ship->pirates as $pirate)
                            <tr>
                                <td>{{ $pirate->name }}
                                     @if($pirate?->hasRole('captain'))
                                        <i class="fa-solid fa-star"></i>
                                    @endif
                                </td>
                                <td>{{ $pirate->specialty }}</td>
                                <td>{{ $pirate->age }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
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
        @captain
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    Liste des Trésors - total : {{$ship->amountTreasure()}} Pièces d'or
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="table-secondary">
                        <tr>
                            <th class="col-md-3">Nom</th>
                            <th class="col-md-3">Poids</th>
                            <th class="col-md-3">Prix</th>
                            <th class="col-md-3">Etat</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ship->treasures as $treasure)
                            <tr>
                                <td>{{ $treasure->name }}</td>
                                <td>{{ $treasure->weight }}</td>
                                <td>{{ $treasure->price }}</td>
                                <td>{{ $treasure->condition }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endcaptain
    </div>
</div>

@endsection
