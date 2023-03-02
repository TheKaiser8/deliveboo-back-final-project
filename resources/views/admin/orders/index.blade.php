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
                            <td>{{ $order->total_price . '€'}}</td>
                            <td>{{ $order->email_customer }}</td>
                            <td>{{ $order->address_customer }}</td>
                            <td>{{ $order->phone_number }}</td>              
                            <td>{{ $order->created_at }}</td>
                            <td class="text-center"><a href="{{ route('admin.orders.show', $order) }}" class="btn btn-outline-info ms-white-hover my-1"><i class="fa-solid fa-eye"></i></a></td>
                            {{-- <td>
                                
                                <!-- Button modale (modalDelete) -->
                                <button type="button" class="btn btn-outline-danger ms-white-hover my-1" data-bs-toggle="modal" data-bs-target="#modalDelete-{{ $order->id }}"><i class="fa-solid fa-trash"></i></button>
                            </td> --}}
                        </tr>
                        
                        <!-- Modale (modalDelete) -->
                        {{-- <div class="modal fade" id="modalDelete-{{ $order->id }}" tabindex="-1" aria-labelledby="modalDeleteLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalDeleteLabel">Cancellazione Prodotto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Confermi di voler cancellare definitivamente l'ordine <strong>"{{ $order->customer_name }}"</strong>?</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Annulla</button>
                                        <form action="{{ route('admin.orders.destroy', $order)}}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger fw-semibold">Sì, cancella!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    
@endsection