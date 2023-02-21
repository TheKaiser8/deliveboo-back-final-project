@extends('layouts.admin')

@section('page-title')
    Ristoranti
@endsection

@section('content')
    <h2>Il tuo ristorante</h2>
    <a href="{{ route('admin.restaurants.create')}}" class="btn btn-primary">crea ristorante</a>
@endsection