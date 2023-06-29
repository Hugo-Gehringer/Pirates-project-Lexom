@extends('layouts.app')
@section('content')
<script src="resources/js/ressource.js"></script>
<div class="container">
    <div class="text-center my-3 mt-5">
        <h1>La liste de toutes les ressources du navire
            <span class="fw-bold">{{$ship->name}} (#{{$ship->id}})</span>
            <a class="nav-link -danger" href="{{ route('ressources.create') }}">{{ __('ressource') }}</a>
        </h1>
    </div>
    <div class="mt-5">
        <table class="table table-light">
            <thead class="table-secondary">
            <tr>
                <th class="col-md-3">Nom</th>
                <th class="col-md-2">Quantitée</th>
                <th class="col-md-5">Type</th>
                <th class="col-md-2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ship->ressources as $ressource)
                <tr>
                    <td>{{ $ressource->name }}</td>
                    <td>
                        {{$ressource->quantity }}
                    </td>
                    <td>
                        {{ config('constants.ressources_type')[$ressource->type] }}
                    </td>
                    <td class="text-center">
                        <a href="{{route("ressources.edit", [$ressource])}}" class="btn btn-warning">Modifier</a>
                    </td>
                </tr>
{{--            @empty--}}
{{--                <tr>--}}
{{--                    <td colspan="5">Aucun formulaire à traiter</td>--}}
{{--                </tr>--}}
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
