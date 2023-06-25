@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="my-5">
            <h1>Ajouter une nouvelle ressource</h1>
        </div>
       @include('Ressources.ressource_form')
    </div>
@endsection
