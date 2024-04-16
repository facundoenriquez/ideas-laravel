@extends('layout.layout')

@section('content')
    <div class="row">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
            <h1>Terms</h1>
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam iste provident assumenda voluptatum, doloribus
                consequatur facilis doloremque. Ullam quibusdam, maxime fugiat corrupti corporis laudantium molestias quia
                quae ut placeat natus beatae excepturi dolorum odit a culpa quod cumque rem praesentium veniam aliquid?
                Perferendis quod qui tenetur magni ipsum nam similique.
            </div>
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
