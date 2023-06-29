@extends('layouts.app')
@section('content')
    <br>
    <div class="container">
        <div class="my-5">
            <h1>Editer un trésor</h1>
        </div>
        @include('Treasures.treasure_form')
    </div>
@endsection
