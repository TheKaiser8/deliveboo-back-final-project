@extends('layouts.admin')

@section('page-title')
    Dettagli ordine
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center py-4">
        <h2 class="fw-semibold text-center mb-4">Dettagli ordine</h2>
        <div class="card w-75 rounded-top">
            <div class="card-body">
                <div class="bg-light rounded-top p-3">
                    <h4 class="card-title text-center fw-bold mb-3">ID ordine #{{ $order->id}}</h4>
                    <div class="mb-3">
                        <strong>Totale ordine:</strong> 
                        <strong class="text-success">{{ number_format($order->total_price, 2, ',') . ' €' }}</strong>
                    </div>
                    <div class="mb-3">
                        <strong>Nome cliente:</strong> {{ $order->name_customer }}
                    </div>
                    <div class="mb-3">
                        <strong>Email cliente:</strong> {{ $order->email_customer }}
                    </div>
                    <div class="mb-3">
                        <strong>Recapito telefonico cliente:</strong>
                        {{ $order->phone_number }}
                    </div>
                    <div class="mb-3">
                        <strong>Indirizzo cliente:</strong>
                        {{ $order->address_customer }}
                    </div>
                    <table class="ms-table table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Prodotti ordinati</th>
                                <th scope="col" class="text-center">Prezzo unitario</th>
                                <th scope="col" class="text-center">Quantità</th>
                                <th scope="col" class="text-center">Totale prodotto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->products as $product)
                                <tr class="align-middle">
                                    <td>{{ $product->name }}</td>
                                    <td class="text-center">{{ number_format($product->price, 2, ',') . ' €' }}</td>
                                    <td class="text-center">{{ $product->pivot->quantity }}</td>
                                    <td class="text-center">{{ number_format($product->price * ($product->pivot->quantity), 2, ',') . ' €' }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center bg-light rounded-bottom pb-3">
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-primary fw-semibold m-1"><i class="fa-solid fa-arrow-left me-1"></i> Torna agli ordini</a>
                </div>
            </div>
        </div>
    </div>
@endsection