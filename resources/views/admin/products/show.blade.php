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

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $product->id }}"><i class="fa-solid fa-trash"></i></button>
    </form>
    <!-- Modale (modalDelete) -->
    <div class="modal fade" id="modalDelete-{{ $product->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDeleteLabel">Cancellazione Prodotto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Confermi di voler cancellare definitivamente il prodotto <strong>"{{ $product->name }}"</strong>?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.products.destroy', $product)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Sì, cancella</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.products.index') }}" class="btn btn-primary my-3">Torna ai prodotti</a>
@endsection