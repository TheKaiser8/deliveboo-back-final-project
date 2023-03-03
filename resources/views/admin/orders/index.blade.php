@extends('layouts.admin')

@section('page-title')
    Ordini 
@endsection

@section('content')
    <div class="container py-4">
        <h2 class="fw-semibold text-center mb-4">I tuoi ordini</h2>
        <div class="w-100">
            @include('partials.message')
        </div>

        @if(count($orders) < 1)
            <h2 class="text-center text-white ms-bg-title rounded py-5 mb-3">Il tuo ristorante non ha ordini!</h2> 
        @else
            <table class="ms-table table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nome Cliente</th>
                        <th scope="col">Pagamento</th>
                        <th scope="col">Email Cliente</th>
                        <th scope="col">Indirizzo Cliente</th>
                        <th scope="col">Telefono Cliente</th>
                        <th scope="col">Data Creazione</th>
                        <th scope="col" class="text-center">Dettagli Ordine</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="align-middle">
                            <td>{{ $order->name_customer }}</td>
                            <td>{{ $order->total_price . ' €'}}</td>
                            <td>{{ $order->email_customer }}</td>
                            <td>{{ $order->address_customer }}</td>
                            <td>{{ $order->phone_number }}</td>              
                            <td>{{ $order->created_at }}</td>
                            <td class="text-center"><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-outline-info ms-white-hover my-1"><i class="fa-solid fa-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
@endsection