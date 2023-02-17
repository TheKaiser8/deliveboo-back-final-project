@extends('layouts.admin')

@section('page-title')
    Crea 
@endsection

@section('content')
    <h2>Crea un Nuovo Ristorante</h2>

    <div class="container mt-5">
        <h1>Crea un Nuovo Ristorante</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div> 
        @endif  --}}
        <form action="{{route('admin.restaurants.store')}}" method="POST" enctype="multipart/form-data" class="mb-5"> {{-- se non usassi l'enctype mi verrebbe restituito solo il nome dell'immagine --}}
        @csrf
            <div class="mb-3">
               <label for="name" class="form-label"><h6>Nome*</h6></label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome del tuo ristorante" value="{{old('name')}}">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label"><h6>Indirizzo*</h6></label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Dove si trova il tuo ristorante?" value="{{old('address')}}">
            </div>
            <div class="mb-3">
                <label for="vat_number" class="form-label"><h6>Partita IVA*</h6></label>
                <input type="text" class="form-control" id="vat_number" name="vat_number" placeholder="Inserisci la partita IVA" value="{{old('vat_number')}}">
            </div>
            
            <div class="mb-3 w-25">
                <label for="image" class="form-label"><h6>Copertina Ristorante</h6></label> 

                {{-- image preview --}}
                <div>
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
                </div>
                
                <input type="file" class="form-control" id="image" name="image" value="{{old('image')}}" onchange="loadFile(event)">
            </div>
            
            <div class="mb-3">
                <h6>Cucine</h6>
                @foreach ($kitchens as $kitchen)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="{{$kitchen->id}}" {{ in_array($kitchen->id, old('kitchens', []) ) ? 'checked' : ''}} name="kitchens[]" value="{{$kitchen->id}}" >
                        <label class="form-check-label" for="{{$kitchen->id}}">{{$kitchen->name}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">Conferma</button>
        </form>

        {{-- <div>
            <a href="{{ route('admin.projects.index')}}" class="btn btn-primary">Return to Projects List</a>
        </div> --}}
        
    </div>
@endsection