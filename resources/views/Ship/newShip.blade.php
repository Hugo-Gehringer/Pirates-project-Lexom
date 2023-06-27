@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="my-5">
            <h1>Ajouter une nouveau navire</h1>
        </div>
       @include('Ship.ship_form')
    </div>
@endsection
