@extends('layouts.admin')

@section('page-title')
    Dettagli
@endsection

@section('content')
    <h2 class="text-decoration-underline my-3">Dettagli progetto</h2>
    <div class="card">
        <div class="text-center">
            @if ($restaurant->image)
                <img src="{{ asset("storage/$restaurant->image") }}" class="card-img-top w-50" alt="{{ $restaurant->name }}">
            @endif
        </div>
        <div class="card-body">
            <h4 class="card-title fw-bold">{{ $restaurant->name}}</h4>
            <h5 class="card-subtitle mb-2 text-muted">{{ $restaurant->id }}</h5>
        </div>
    </div>
    <a href="{{ route('admin.restaurants.index') }}" class="btn btn-secondary my-3">Torna ai ristoranti</a>
@endsection