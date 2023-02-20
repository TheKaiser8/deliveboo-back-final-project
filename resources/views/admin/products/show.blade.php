@extends('layouts.admin')

@section('page-title')
    Dettagli
@endsection

@section('content')
    <h2 class="text-decoration-underline my-3">Dettagli prodotto</h2>
    <div class="card">
        <div class="text-center">
            @if ($product->image)
                <img src="{{ asset("storage/$product->image") }}" class="card-img-top w-50" alt="{{ $product->name }}">
            @endif
        </div>
        <div class="card-body">
            <h4 class="card-title fw-bold">{{ $product->name}}</h4>
            <h5 class="card-subtitle mb-2 text-muted">{{ $product->id }}</h5>
            <div>
                <p>{{ $product->typology }}</p>
                <p>{{ $product->dish }}</p>
                <p>{{ $product->description }}</p>
                <p>{{ $product->ingredients }}</p>
                <div>
                    <strong>{{ $product->price }}€</strong>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.products.destroy', $product)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Sì, cancella</button>
    </form>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary my-3">Torna ai prodotti</a>
@endsection