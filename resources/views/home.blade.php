@extends('layouts.app')
@vite(['resources/js/dashboard.js'])
@section('content')
    <script type="text/javascript" src="{{asset('assets/dashboard.js') }}"></script>
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('Bienvenue sur le Tableau de bord') }}
                    @captain
                        - Capitaine du {{$ship->name}}
                    @else
                        - Matelot -  {{ auth()?->user()?->specialty ? config('constants.users_specialty')[auth()?->user()?->specialty] :''}}
                    @endcaptain
                </div>
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
                            <th class="col-md-4">Nom</th>
                            <th class="col-md-4">Spécialitée</th>
                            <th class="col-md-2">mail</th>
                            <th class="col-md-2">age</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ship->pirates as $pirate)
                        <tr>
                            <td>{{ $pirate->name }} {{$pirate->firstname}}
                                @if($pirate->hasrole('captain'))
                                    <i class="fa-solid fa-star"></i>
                                @endif
                            </td>
                            <td>
                                {{ $pirate->specialty ? config('constants.users_specialty')[$pirate->specialty] :''}}
                            </td>
                            <td>{{ $pirate->email }}</td>

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
                    <a class="btn btn-info" href="{{ route('ressources.create') }}">Ajouter</a>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="table-secondary">
                        <tr>
                            <th class="col-md-3">Nom</th>
                            <th class="col-md-3">Quantitée</th>
                            <th class="col-md-3">Type</th>
                           @isCook
                                <th class="col-md-3">Action</th>
                           @endisCook
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
                                @isCook
                                    <td>
                                        <form action="{{ route('ressources.destroy',$ressource->id) }}" method="POST">
                                            <a class="btn btn-sm btn-warning" href="{{ route('ressources.edit.cook', $ressource) }}">Modifier</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                @endisCook
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
                    <a class="btn btn-primary">Ajouter</a>
                </div>
                <div class="card-body">
                    <table class="table table-light">
                        <thead class="table-secondary">
                        <tr>
                            <th class="col-md-1">Nom</th>
                            <th class="col-md-1">Poids</th>
                            <th class="col-md-1">Prix</th>
                            <th class="col-md-1">Etat</th>
                            <th class="col-md-8">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($ship->treasures as $treasure)
                            <tr>
                                <td>{{ $treasure->name }}</td>
                                <td>{{ $treasure->weight }}</td>
                                <td>{{ $treasure->price }}</td>
                                <td>
                                    {{ config('constants.treasures_condition')[$treasure->condition] }}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-warning">Modifier</a>
                                    <a class="btn btn-sm btn-danger">Supprimer</a>
                                </td>
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
