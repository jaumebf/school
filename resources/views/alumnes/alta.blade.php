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
        <h1 align='center'>Afegir alumne</h1>
        <br>
    </div>

    <div class="col-md-10">
        <form method="POST" action="{{url('alumnes/afegir')}}">
            @csrf

            <div class="form-group {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom">
                <label for="nom" class="col-sm-2 col-form-label col-form-label-sm">Nom</label>               
                <input type="text" name="nom" value="{{old('nom')}}" class="form-control">                 
                @if($errors->has('nom'))                  
                <strong>{{ $errors->first('nom') }}</strong>                  
                @endif    
            </div>

            <div class="form-group {{ $errors->has('cognom') ? 'is-invalid' : '' }}" name="cognom">
                <label for="cognom" class="col-sm-2 col-form-label col-form-label-sm">Cognom</label>               
                <input type="text" name="cognom" value="{{old('cognom')}}" class="form-control">                 
                @if($errors->has('cognom'))                  
                <strong>{{ $errors->first('cognom') }}</strong>                  
                @endif    
            </div>

            <div class="form-group {{ $errors->has('dni') ? 'is-invalid' : '' }}" name="dni">
                <label for="dni" class="col-sm-2 col-form-label col-form-label-sm">DNI</label>               
                <input type="text" name="dni" value="{{old('dni')}}" class="form-control">                 
                @if($errors->has('dni'))                  
                <strong>{{ $errors->first('dni') }}</strong>                  
                @endif    
            </div>

            <div class="form-group {{ $errors->has('curs') ? 'is-invalid' : '' }}" name="curs">
                <label for="curs" class="col-sm-2 col-form-label col-form-label-sm">Curs</label>               
                <input type="number" name="curs" value="{{old('curs')}}" class="form-control">                 
                @if($errors->has('cognom'))                  
                <strong>{{ $errors->first('curs') }}</strong>                  
                @endif    
            </div>
            
            <?php
                $class = ["A","B"];
            ?>
            <div class="form-group" name="classe">
                <label for="classe" class="col-sm-2 col-form-label col-form-label-sm">Classe</label>
                <select class="form-control" name="classe">
                    @for ($i=0; $i< sizeof($class); $i++)
                      <option value='{{$class[$i]}}'>{{$class[$i]}}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group {{ $errors->has('dob') ? 'is-invalid' : '' }}" name="dob">
                <label for="dob" class="col-sm-2 col-form-label col-form-label-sm">Data de naixement</label>               
                <input type="date" name="dob" value="{{old('dob')}}" class="form-control">                 
                @if($errors->has('dob'))                  
                <strong>{{ $errors->first('dob') }}</strong>                  
                @endif    
            </div>
            
            <br>
            <button type="submit" class="btn btn-primary">Afegir alumne</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection

