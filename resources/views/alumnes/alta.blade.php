<h1>Afegir alumne</h1>
<form method="POST" action="{{url('alumnes/afegir')}}">
    @csrf
    
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{old('nom')}}">
    </div>
    
    <div class="form-group">
        <label for="cognom">Cognom</label>
        <input type="text" name="cognom" value="{{old('cognom')}}">
    </div>
    
    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="text" name="dni" value="{{old('dni')}}">
    </div>
    <br>
        
    <div class="form-group">
        <label for="curs">Curs</label>
        <input type="text" name="curs" value="{{old('curs')}}">
    </div>
    <br>
    
    <div class="form-group">
        <label for="dob">Data de naixement</label>
        <input type="date" name="dob" value="{{old('dob')}}">
    </div>
    
    <br>
    
    <input type="submit" value="Afegir alumne">        
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif