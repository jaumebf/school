@extends('layouts.app')

@section('content')
<ul class="nav justify-content-center"> 
    <li class="nav-item">
        <a class="nav-link active" href="{{ url("usuaris/llistat") }}">Llistar usuaris</a>
    </li>
</ul>

<div class="row justify-content-center">
    <div class="col-md-4">
        <br>
        <h1 align='center'>Afegir usuari</h1>
        <br>
    </div>

    <div class="col-md-10">
        <form method="POST" action="{{url('usuaris/alta')}}">
            @csrf

            <div class="form-group {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name">
                <label for="name" class="col-sm-2 col-form-label col-form-label-sm">Nom</label>               
                <input type="text" name="name" value="{{old('name')}}" class="form-control">                 
                @if($errors->has('name'))                  
                <strong>{{ $errors->first('name') }}</strong>                  
                @endif    
            </div>

            <div class="form-group {{ $errors->has('surname') ? 'is-invalid' : '' }}" name="surname">
                <label for="surname" class="col-sm-2 col-form-label col-form-label-sm">Cognom</label>               
                <input type="text" name="surname" value="{{old('surname')}}" class="form-control">                 
                @if($errors->has('surname'))                  
                <strong>{{ $errors->first('surname') }}</strong>                  
                @endif    
            </div>
            
            <div class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email">
                <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Correu electrònic</label>               
                <input type="text" name="email" value="{{old('email')}}" class="form-control">                 
                @if($errors->has('email'))                  
                <strong>{{ $errors->first('email') }}</strong>                  
                @endif    
            </div>

            <div class="form-group {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
                <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Contrasenya</label>               
                <input type="password" name="password" value="{{old('password')}}" class="form-control">                 
                @if($errors->has('password'))                  
                <strong>{{ $errors->first('password') }}</strong>                  
                @endif    
            </div>
            
            <?php
                $role = ["Administrador", "Usuari normal"];
            ?>
            <div class="form-group" name="classe">
                <label for="role" class="col-sm-2 col-form-label col-form-label-sm">Rol</label>
                <select class="form-control" name="role">
                    @for ($i=0; $i< sizeof($role); $i++)
                      <option value='{{$i}}' selected>{{$role[$i]}}</option>
                    @endfor
                </select>
            </div>

            <br>
            <button type="submit" class="btn btn-primary">Afegir usuari</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection

