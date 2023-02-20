@extends('layouts.admin')

@section('page-title')
    Crea Menù 
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Aggiungi un prodotto</h1>
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div> 
        @endif  --}}
        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data" class="mb-5"> {{-- se non usassi l'enctype mi verrebbe restituito solo il nome dell'immagine --}}
        @csrf
            <div class="mb-3">
               <label for="name" class="form-label"><h6>Nome*</h6></label>
               <input type="text" class="form-control" id="name" name="name" placeholder="Inserisci il nome di questo piatto" value="{{old('name')}}">
            </div>
            <div class="mb-3 w-25">
                <label for="is_available" class="form-label"><h6>Disponibilità*</h6></label>
                <select name="is_available" id="is_available" class="form-select">
                    <option value="1" {{ old('is_available') == 1 ? 'selected' : ''}}>Disponibile</option>
                    <option value="0" {{ old('is_available') == 0 ? 'selected' : ''}}>Non Disponibile</option>
                </select>
            </div>
            <div class="mb-3 w-25">
                <label for="typology" class="form-label"><h6>Tipologia*</h6></label>
                <select name="typology" id="typology" class="form-select">
                    <option value="cibo" {{ old('typology') == 'cibo' ? 'selected' : ''}}>Cibo</option>
                    <option value="bevanda" {{ old('typology') == 'bevanda' ? 'selected' : ''}}>Bevanda</option>
                </select>
            </div>
            <div class="mb-3 w-25">
                <label for="dish" class="form-label"><h6>Portata*</h6></label>
                <select name="dish" id="dish" class="form-select">
                    <option value="primo" {{ old('dish') === 'primo' ? 'selected' : '' }}>Primo</option>
                    <option value="secondo" {{ old('dish') === 'secondo' ? 'selected' : ''}}>Secondo</option>
                    <option value="contorno" {{ old('dish') === 'contorno' ? 'selected' : ''}}>Contorno</option>
                    <option value="dessert" {{ old('dish') === 'dessert' ? 'selected' : ''}}>Dessert</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label"><h6>Descrizione Piatto*</h6></label>
                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Descrivi il tuo piatto...">{{old('description')}}</textarea>
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label"><h6>Elenco Ingredienti*</h6></label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="Elenca gli ingedienti del tuo piatto...">{{old('ingredients')}}</textarea>
            </div>

             <div class="mb-3">
                <label for="price" class="form-label"><h6>Prezzo*</h6></label>
                <input type="number" class="form-control" id="price" name="price" min="0" value="{{ old('price') }}" step=".01" max="9999.99" placeholder="00,00">
            </div>

            <div class="mb-3 w-25">
                <label for="image" class="form-label"><h6>Immagine Piatto</h6></label> 
                
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
            
            <button type="submit" class="btn btn-success">Conferma</button>
        </form>

        <div>
            <a href="{{ route('admin.products.index')}}" class="btn btn-primary">Return to Projects List</a>
        </div>
        
    </div>
@endsection