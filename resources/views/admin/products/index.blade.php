@extends('layouts.admin')

@section('page-title')
    Prodotti 
@endsection

@section('content')
    <h2>I tuoi prodotti</h2>
    <a href="{{ route('admin.products.create')}}" class="btn btn-primary">Crea prodotto</a>
@endsection