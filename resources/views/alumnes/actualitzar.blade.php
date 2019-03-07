<h1>Actualitzar Alumne</h1>
<form method="POST" action="{{url('alumnes/actualitzar')}}">
    @csrf
    <input type="hidden" name="id" value="{{$alumne->id}}"
    <div class="form-group">
        <label for="nom">Nom</label>
        <input type="text" name="nom" value="{{$alumne->name}}">
    </div>
    
    <div class="form-group">
        <label for="cognom">Cognom</label>
        <input type="text" name="cognom" value="{{$alumne->surname}}">
    </div>
    
    <div class="form-group">
        <label for="dni">DNI</label>
        <input type="text" name="dni" value="{{$alumne->dni}}">
    </div>
    <br>
        
    <div class="form-group">
        <label for="curs">Curs</label>
        <input type="text" name="curs" value="{{$alumne->course}}">
    </div>
    <br>
    
    <div class="form-group">
        <label for="dob">Data de naixement</label>
        <input type="date" name="dob" value="{{$alumne->dob}}">
    </div>
    
    <br>
    
    <input type="submit" value="Guardar alumne">        
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