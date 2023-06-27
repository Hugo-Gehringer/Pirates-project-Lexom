@extends('layouts.app')
@section('content')

<div class="container">
    <div class="text-center my-3 mt-5">
        <h1>La liste de toutes les ressources</h1>
    </div>
    <div class="mt-5">
        <table class="table table-light">
            <thead class="table-secondary">
            <tr>
                <th class="col-md-3">Nom</th>
                <th class="col-md-3">Quantitée</th>
                <th class="col-md-5">Type</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ressources as $ressource)
                <tr>
                    <td>{{ $ressource->name }}</td>
                    <td>{{ $ressource->quantity }}</td>
                    <td>
                        {{ config('constants.ressources_type')[$ressource->type] }}
                    </td>

{{--                    <td class="text-center">--}}
{{--                        <form name="checkState" method="post" action="#">--}}
{{--                            <input class="form-check-input" type="checkbox" name="checkBoxState" id="checkBoxState" data-idcontactForm="{{ contactForm.id }}">--}}
{{--                        </form>--}}
{{--                    </td>--}}
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
