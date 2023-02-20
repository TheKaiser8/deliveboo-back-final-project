@extends('layouts.admin')

@section('page-title')
    Menù 
@endsection

@section('content')
    <h2>il tuo menù</h2>
    @dd($products);
    {{-- <a href="{{ route('admin.restaurants.create')}}" class="btn btn-primary">crea ristorante</a> --}}
@endsection