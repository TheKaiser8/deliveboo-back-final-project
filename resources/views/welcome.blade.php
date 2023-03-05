@extends('layouts.app')

@section('page-title')
    Benvenuti in DeliveBoo 
@endsection

@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="d-flex welcome-logo text-align-center">
            <img src="{{Vite::asset('resources/assets/images/Deliveroo-Logo-final.png')}}" alt="logo">
        </div>
        <h1 class="display-5 fw-bold">
            Benvenuto su DeliveBoo 
        </h1>

        <p class="col-md-8 fs-4">Una volta registrato potrai creare il tuo ristorante e gestire menù e ordini come vorrai!</p>

        <button class="btn btn-primary btn-lg" type="button">Registrati</button>
        <button class="btn btn-primary btn-lg" type="button">Accedi</button>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div>
@endsection
