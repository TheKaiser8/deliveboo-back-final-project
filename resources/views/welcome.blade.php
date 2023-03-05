@extends('layouts.app')

@section('page-title')
    Benvenuti in DeliveBoo 
@endsection

@section('content')

<div class="jumbotron p-5 pb-0 my-6 rounded-3">
    <div class="container py-5">
        <div class="welcome-logo m-auto">
            <img src="{{Vite::asset('resources/assets/images/Deliveroo-Logo-final.png')}}" alt="logo">
        </div>
        <h1 class=" welcome-title display-5 fw-bold">
            Benvenuto su DeliveBoo 
        </h1>

        <p class="welcome-text col-md-8 fs-4">Una volta registrato potrai creare il tuo ristorante e gestire menù e ordini come vorrai!</p>

        
    </div>
</div>
@endsection
