@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="my-5">
            <h1>Ajouter un nouveau matelot</h1>
        </div>
       @include('Users.user_form')
    </div>
@endsection
