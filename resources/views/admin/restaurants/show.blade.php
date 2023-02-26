@extends('layouts.admin')

@section('page-title')
    Dettagli
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center py-4">
        <h2 class="fw-semibold text-center mb-4">Dettagli "{{ $restaurant->name }}"</h2>
        <div class="card w-50 rounded-top">
            @if ($restaurant->image)
                <div class="text-center p-3 bg-dark rounded-top">
                    <img src="{{ asset("storage/$restaurant->image") }}" class="card-img-top" alt="{{ $restaurant->name }}">
                </div>
            @endif
            <div class="card-body d-flex flex-column">
                <div class="row bg-light rounded-top m-0 ">
                    <div class="col-6 m-auto px-4">
                        <h4 class="card-title fw-bold">{{ $restaurant->name}}</h4>
                        <div class="mb-2">
                            <strong class="text-muted fs-5">{{ $restaurant->city }}</strong>
                        </div>
                    </div>
                    <div class="col-6 rounded py-3">
                        <p><strong>Indirizzo:</strong> {{ $restaurant->street_address}} - {{ $restaurant->postal_code }}</p>
                        <p><strong>Partita IVA:</strong> {{ $restaurant->vat_number }}</p>
                        <div>
                            <strong>Cucina/e:</strong> 
                            @foreach($restaurant->kitchens as $kitchen)
                                <span class="badge text-bg-primary ms-1">{{ $kitchen->name }}</span>
                            @endforeach
                        </div>
                    </div>   
                </div>
                <div class="text-center bg-light rounded-bottom py-3">
                    <a href="{{ route('admin.restaurants.edit', $restaurant) }}" class="btn btn-warning text-white fw-semibold m-1"><i class="fa-solid fa-pen-to-square me-1"></i> Modifica</a>
                    <button type="button" class="btn btn-danger fw-semibold m-1" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $restaurant->id }}"><i class="fa-solid fa-trash me-1"></i> Cancella</button>
                </div>
            </div>      
        </div>
        <form action="{{ route('admin.restaurants.destroy', $restaurant)}}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
        </form>
        <!-- Modale (modalDelete) -->
        <div>
            <div class="modal fade" id="modalDelete-{{ $restaurant->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalDeleteLabel">Cancellazione Ristorante</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">Confermi di voler cancellare definitivamente il ristorante <strong>"{{ $restaurant->name }}"</strong>?</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Annulla</button>
                            <form action="{{ route('admin.restaurants.destroy', $restaurant)}}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger fw-semibold">Sì, cancella!</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
@endsection