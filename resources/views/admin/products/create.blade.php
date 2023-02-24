@extends('layouts.admin')

@section('page-title')
    Crea Menù 
@endsection

@section('content')
    <div class="container mt-5">
        <h1>Aggiungi un prodotto</h1>
        <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data" class="mb-5">
        @csrf
            {{-- campo nome --}}
            <div class="mb-3">
                <label for="name" class="form-label"><h6>Nome*</h6></label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome di questo piatto" value="{{old('name')}}" maxlength="100" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo disponibilità --}}
            <div class="mb-3 w-25">
                <label for="is_available" class="form-label"><h6>Disponibilità*</h6></label>
                <select name="is_available" id="is_available" class="form-select @error('is_available') is-invalid @enderror" required>
                    <option value="1" {{ old('is_available') == 1 ? 'selected' : ''}}>Disponibile</option>
                    <option value="0" {{ old('is_available') == 0 ? 'selected' : ''}}>Non Disponibile</option>
                </select>
                @error('is_available')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo tipologia --}}
            <div class="mb-3 w-25">
                <label for="typology" class="form-label"><h6>Tipologia*</h6></label>
                <select name="typology" id="typology" class="form-select @error('typology') is-invalid @enderror" required>
                    <option value="" selected>Seleziona una tipologia</option>
                    <option value="panini" {{ old('typology') == 'panini' ? 'selected' : ''}}>Panini</option>
                    <option value="pizza" {{ old('typology') == 'pizza' ? 'selected' : ''}}>Pizza</option>
                    <option value="sushi" {{ old('typology') == 'sushi' ? 'selected' : ''}}>Sushi</option>
                    <option value="vegetariano" {{ old('typology') == 'vegetariano' ? 'selected' : ''}}>Vegetariano</option>
                    <option value="dessert" {{ old('typology') == 'dessert' ? 'selected' : ''}}>Dessert</option>
                    <option value="bevande" {{ old('typology') == 'bevande' ? 'selected' : ''}}>Bevande</option>
                    <option value="alcolici" {{ old('typology') == 'alcolici' ? 'selected' : ''}}>Alcolici</option>
                </select>
                @error('typology')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo descrizione --}}
            <div class="mb-3">
                <label for="description" class="form-label"><h6>Descrizione Piatto*</h6></label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5" placeholder="Descrivi il tuo piatto..." maxlength="500" required>{{old('description')}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo ingredienti --}}
            <div class="mb-3">
                <label for="ingredients" class="form-label @error('ingredients') is-invalid @enderror"><h6>Elenco Ingredienti*</h6></label>
                <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="Elenca gli ingedienti del tuo piatto..." maxlength="500" required>{{old('ingredients')}}</textarea>
                @error('ingredients')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo prezzo --}}
             <div class="mb-3">
                <label for="price" class="form-label @error('price') is-invalid @enderror"><h6>Prezzo*</h6></label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" min="0" step=".01" max="99.99" placeholder="00,00" required>
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            {{-- campo immagine --}}
            <div class="mb-3 w-25">
                <label for="image" class="form-label"><h6>Immagine Piatto</h6></label> 
                {{-- preview immagine  --}}
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
                {{-- /preview immagine  --}}
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}" onchange="loadFile(event)">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <button type="submit" class="btn btn-success">Conferma</button>
                <a href="{{ route('admin.products.index')}}" class="btn btn-primary">Torna ai prodotti</a>
            </div>         
        </form>
    </div>
@endsection