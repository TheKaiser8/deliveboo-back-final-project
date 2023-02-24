@extends('layouts.admin')

@section('page-title')
    Prodotti 
@endsection

@section('content')
    <div class="container mt-3">
        <h2 class="mb-3">I tuoi prodotti</h2>
        <a href="{{ route('admin.products.create')}}" class="btn btn-primary mb-3">Crea prodotto</a>

        @if(count($products) < 1)
            <h2 class="mb-3">Non hai ancora creato alcun prodotto!</h2> 
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Tipologia</th>
                        <th scope="col">Disponibilità</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->typology}}</td>
                            <td>{{ $product->is_available == 1 ? 'Disponibile' : 'Non disponibile'}}</td>
                            <td>{{ $product->price}}</td>
                            <td>
                                <a href="{{ route('admin.products.show', $product) }}" class="btn btn-light"><i class="fa-solid fa-eye"></i></a>
                                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-light"><i class="fa-solid fa-pen-to-square"></i></a>
            
                                <!-- Button modale (modalDelete) -->
                                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $product->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
@endsection