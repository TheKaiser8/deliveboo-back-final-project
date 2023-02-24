@extends('layouts.admin')

@section('page-title')
    Dettagli
@endsection

@section('content')
    <h2 class="text-decoration-underline my-3">Dettagli ristorante</h2>
    <div class="card">
        <div class="text-center">
            @if ($restaurant->image)
                <img src="{{ asset("storage/$restaurant->image") }}" class="card-img-top w-50" alt="{{ $restaurant->name }}">
            @endif
        </div>
        <div class="card-body">
            <h4 class="card-title fw-bold">{{ $restaurant->name}}</h4>
            <div class="mb-2">
                <strong class="fs-5">{{ $restaurant->city }}</strong>
            </div>
            <p><strong>Indirizzo:</strong> {{ $restaurant->street_address}} - {{ $restaurant->postal_code }}</p>
            <p><strong>Partita IVA:</strong> {{ $restaurant->vat_number }}</p>
        </div>
    </div>
    <form action="{{ route('admin.restaurants.destroy', $restaurant)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger my-3">Cancella</button>
    </form>
    <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-primary my-3">Modifica</a>
@endsection