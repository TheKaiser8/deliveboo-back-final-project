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
                <strong class="text-muted fs-5">{{ $restaurant->city }}</strong>
            </div>
            <p><strong>Indirizzo:</strong> {{ $restaurant->street_address}} - {{ $restaurant->postal_code }}</p>
            <p><strong>Partita IVA:</strong> {{ $restaurant->vat_number }}</p>
            <div class="mb-3">
                <strong>Cucina/e:</strong> 
                @foreach($restaurant->kitchens as $kitchen)
                    <span class="badge text-bg-primary ms-1">{{ $kitchen->name }}</span>
                @endforeach
            </div>
        </div>

        
    </div>
    <form action="{{ route('admin.restaurants.destroy', $restaurant)}}" method="POST" class="d-inline-block">
        @csrf
        @method('DELETE')

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $restaurant->id }}"><i class="fa-solid fa-trash"></i></button>
    </form>
    <!-- Modale (modalDelete) -->
    <div class="modal fade" id="modalDelete-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalDeleteLabel">Cancellazione Ristorante</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Confermi di voler cancellare definitivamente il ristorante <strong>"{{ $restaurant->name }}"</strong>?</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('admin.restaurants.destroy', $restaurant)}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Sì, cancella</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
@endsection