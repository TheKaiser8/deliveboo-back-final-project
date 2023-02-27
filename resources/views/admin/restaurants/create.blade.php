@extends('layouts.admin')

@section('page-title')
    Crea ristorante
@endsection

@section('content')
    <div class="container py-4">
        <h2 class="fw-semibold text-center mb-4">Crea il tuo ristorante</h2>
        <div class="w-100">
            @include('partials.message')
        </div>
        {{-- form di creazione ristorante --}}
        <form action="{{route('admin.restaurants.store')}}" id="myForm" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
            {{-- campo nome --}}
            <div class="mb-3">
               <label for="name" class="form-label fw-semibold mb-2">Nome*</label>
               <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome del tuo ristorante" value="{{old('name')}}" maxlength="100" required>
               @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo città --}}
            <div class="mb-3 w-50">
                <label for="city" class="form-label fw-semibold mb-2">Città*</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Inserisci la città del tuo ristorante" value="{{old('city')}}" maxlength="50" required>
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo indirizzo --}}
            <div class="mb-3">
                <label for="street_address" class="form-label fw-semibold mb-2">Indirizzo*</label>
                <input type="text" class="form-control @error('street_address') is-invalid @enderror" id="street_address" name="street_address" placeholder="Inserisci l'indirizzo del tuo ristorante" value="{{old('street_address')}}" maxlength="100" required>
                @error('street_address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo codice postale --}}
            <div class="mb-3 w-25">
                <label for="postal_code" class="form-label fw-semibold mb-2">Codice Postale*</label>
                <input type="text" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" name="postal_code" placeholder="Inserisci il codice postale" value="{{old('postal_code')}}" minlength="5" maxlength="5" required>
                @error('postal_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo partita iva --}}
            <div class="mb-3 w-25">
                <label for="vat_number" class="form-label fw-semibold mb-2">Partita IVA*</label>
                <input type="text" class="form-control @error('vat_number') is-invalid @enderror" id="vat_number" name="vat_number" placeholder="Inserisci la partita IVA" value="{{old('vat_number')}}" minlength="11" maxlength="11" required>
                @error('vat_number')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo immagine --}}
            <div class="mb-3 w-50">
                <label for="image" class="form-label fw-semibold mb-0">Copertina ristorante</label> 
                {{-- image preview --}}
                <div class="ms-lh-0">
                    <img id="output" width="150" class="my-2"/>
                    <script>
                        let loadFile = function(event) {
                            let reader = new FileReader();
                            reader.onload = function(){
                            let output = document.getElementById('output');
                            output.src = reader.result;
                            };
                            reader.readAsDataURL(event.target.files[0]);
                        };
                    </script>
                </div>
                {{-- /preview immagine  --}}
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}" onchange="loadFile(event)">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo cucine --}}
            <div class="mb-3">
                <h6 class="fw-semibold mb-2">Cucina/e*</h6>
                @foreach ($kitchens as $kitchen)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input @error('kitchens') is-invalid @enderror" type="checkbox" id="{{$kitchen->id}}" name="kitchens[]" value="{{$kitchen->id}}" {{ in_array($kitchen->id, old('kitchens', []) ) ? 'checked' : ''}}>
                        <label class="form-check-label" for="{{$kitchen->id}}">{{$kitchen->name}}</label>
                    </div>
                @endforeach
                @error('kitchens')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success fw-semibold me-1"><i class="fa-solid fa-check me-1"></i> Conferma</button>
            </div>
        </form>
<<<<<<< HEAD
        <script>
            document.getElementById('myForm').addEventListener('submit', function(e) {
              let checkboxes = document.getElementsByName('kitchens[]');
              let checked = false;
              for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                  checked = true;
                  break;
                }
              }
              if (!checked) {
                e.preventDefault();
                alert('Seleziona almeno una checkbox');
              }
            });
        </script>  
=======
        {{-- /form di creazione ristorante --}}
>>>>>>> origin/rework_style_products_and_restaurants_crud
    </div>
@endsection