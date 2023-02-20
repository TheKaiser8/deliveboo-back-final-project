@extends('layouts.admin')

@section('page-title')
    Modifica 
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Modifica il tuo Ristorante</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div> 
        @endif  --}}
        <form action="{{ route('admin.restaurants.update', $restaurant) }}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
        @method('PUT')
        
            <div class="mb-3">
               <label for="name" class="form-label"><h6>Nome*</h6></label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del tuo ristorante" value="{{ old('name', $restaurant->name) }}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label"><h6>Indirizzo*</h6></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Dove si trova il tuo ristorante?" value="{{ old('address', $restaurant->address) }}">
            </div>
            <div class="mb-3">
                <label for="vat_number" class="form-label"><h6>Partita IVA*</h6></label>
                <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Inserisci la partita IVA" value="{{ old('vat_number', $restaurant->vat_number) }}">
            </div>
            
            {{-- <div class="mb-3 w-25">
                <label for="image" class="form-label"><h6>Copertina Ristorante</h6></label>  --}}

                {{-- image preview --}}
                {{-- <div>
                    <img id="output" width="100" class="mb-2"/>
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
                </div> --}}
                
                {{-- <input type="file" class="form-control" id="image" name="image" value="{{ old('image', $restaurant->image) }}" onchange="loadFile(event)">
            </div> --}}
            
            <div class="mb-3">
                <h6>Cucine</h6>
                @foreach ($kitchens as $kitchen)
                    <div class="form-check form-check-inline">
                        @if( $errors->any() )
                            {{-- in caso di validazione fallita: --}}
                            <input class="form-check-input" type="checkbox" id="{{$kitchen->id}}" name="kitchens[]" value="{{$kitchen->id}}" {{ in_array($kitchen->id, old('kitchens', []) ) ? 'checked' : ''}}>
                            
                        @else
                            {{-- per avere già flaggate le eventuali "kitchens" già associate: --}}
                            <input class="form-check-input" type="checkbox" id="{{ $kitchen->id }}" name="kitchens[]" value="{{ $kitchen->id }}" {{ $restaurant->kitchens->contains($kitchen->id) ? 'checked' : '' }}>
                        @endif
                            <label class="form-check-label" for="{{$kitchen->id}}">{{$kitchen->name}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">Conferma</button>
        </form>

        <div>
            <a href="{{ route('admin.restaurants.index')}}" class="btn btn-primary">Ritorna al tuo ristorante</a>
        </div>
        
    </div>
@endsection