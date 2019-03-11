@extends('layouts.app')
@section('content')
<ul class="nav justify-content-center"> 
    <li class="nav-item">
        <a class="nav-link active" href="{{ url("alumnes/llistat") }}">Llistar alumnes</a>
    </li>
</ul>

<div class="row justify-content-center">
    <div class="col-md-4">
        <br>
        <h1 align='center'>Pla individualitzat</h1>
        <br>
    </div>

    <div class="col-md-10">
    <form method="POST" action="{{url('alumnes/actualitzar')}}">
    @csrf            
            <input type="hidden" name="id" value="{{$alumne->id}}">
    
            <div class="form-group" name="llengua">
                <label for="llengua" class="col-sm-2 col-form-label col-form-label-sm">Llengua</label>               
                <input type="checkbox" name="llengua" 
                       value="@if($pla && $pla->llengua == 1) checked; @endif" class="form-control"> 
                    {{"La llengua es".$pla->llengua}}              
            </div>
            

            <div class="form-group" name="cognom">
                <label for="cognom" class="col-sm-2 col-form-label col-form-label-sm">Ll castellana</label>               
                <input type="text" name="cognom" value="{{$alumne->surname}}" class="form-control">
                @if($errors->has('cognom'))                  
                <strong>{{ $errors->first('cognom') }}</strong>                  
                @endif    
            </div>

            <div class="form-group" name="dni">
                <label for="dni" class="col-sm-2 col-form-label col-form-label-sm">DNI</label>               
                <input type="text" name="dni" value="{{$alumne->dni}}" class="form-control">
                @if($errors->has('dni'))                  
                <strong>{{ $errors->first('dni') }}</strong>                  
                @endif    
            </div>

            <div class="form-group" name="curs">
                <label for="curs" class="col-sm-2 col-form-label col-form-label-sm">Curs</label>               
                <input type="number" name="curs" value="{{$alumne->course}}" class="form-control">
                @if($errors->has('cognom'))                  
                <strong>{{ $errors->first('curs') }}</strong>                  
                @endif   
            </div>

            <div class="form-group" name="dob">
                <label for="dob" class="col-sm-2 col-form-label col-form-label-sm">Data de naixement</label>               
                <input type="date" name="dob" value="{{$alumne->dob}}" class="form-control">
                @if($errors->has('dob'))                  
                <strong>{{ $errors->first('dob') }}</strong>                  
                @endif                 
            </div>
            
            <br>
            <button type="submit" class="btn btn-primary">Guardar alumne</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection
