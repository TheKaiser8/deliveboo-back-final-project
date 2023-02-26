@extends('layouts.admin')

@section('page-title')
    Dettagli
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center pt-3">
        <h2 class="fw-semibold text-center mb-3">Dettagli "{{ $product->name }}"</h2>
        <div class="card w-50 rounded-top">
            @if ($product->image)
                <div class="text-center p-3 bg-dark rounded-top">
                        <img src="{{ asset("storage/$product->image") }}" class="card-img-top" alt="{{ $product->name }}">
                </div>
            @endif
            <div class="card-body">
                <div class="bg-light rounded-top p-3">
                    <h4 class="card-title text-center fw-bold">{{ $product->name}}</h4>
                    <div class="mb-2">
                        <strong class="text-muted fs-5">{{ ucfirst($product->typology) }}</strong>
                    </div>
                    @if( $product->is_available == 1 ) 
                        <div class="text-success mb-3">
                            <strong>Disponibile</strong>
                        </div>
                    @else
                        <div class="text-danger mb-3">
                            <strong>Non disponibile</strong>
                        </div>
                    @endif
                    <p>
                        <strong>Descrizione:</strong> {{ $product->description }}
                    </p>
                    <p>
                        <strong>Ingredienti:</strong> {{ $product->ingredients }}
                    </p>
                    <div>
                        <strong>Prezzo:</strong>
                        {{ $product->price . '€' }}
                    </div>
                </div>
                <div class="text-center bg-light rounded-bottom pb-3">
                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning text-white fw-semibold m-1"><i class="fa-solid fa-pen-to-square me-1"></i> Modifica</a>
                    <button type="button" class="btn btn-danger fw-semibold m-1" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $product->id }}"><i class="fa-solid fa-trash me-1"></i> Cancella</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-primary fw-semibold m-1"><i class="fa-solid fa-arrow-left me-1"></i> Torna ai prodotti</a>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.products.destroy', $product)}}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')

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
    </div>
@endsection