@extends('layouts.app')

@section('content')
<ul class="nav justify-content-center"> 
  <li class="nav-item">
    <a class="nav-link active" href="{{ url("usuaris/alta") }}">Afegir usuaris</a>
  </li>
</ul>

<div class="row justify-content-center">
<div class="col-md-9">
    @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
</div>

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif

<div class="col-md-10">
        <br>
<h1 align='center'>Llista d'usuaris</h1>
<table class="table table-striped">
    <tr>
        <th>EMAIL</th>
        <th>CONTRASENYA</th>
        <th>ROL</th>
        <th colspan="2">OPERACIÓ</th>
    </tr>

    @foreach($usuaris as $usu)
    <tr>
        <td>{{$usu->email}}</td>   
        
        <td>
            <form method="POST" action="{{url('/usuaris')}}">
                @csrf
                <input type="hidden" name="id" value="{{$usu->id}}">
                <input type="password" name="password"> <input type="submit" value="Canviar" class="btn btn-info">
            </form>
        </td>
        
        @if ($usu->rol == 1)
            <td>Usuari normal</td>
        @else
            <td>Administrador</td>
        @endif

        <td><a href="{{url("usuaris/canviarRol",$usu->id)}}" class="btn btn-info">Canviar rol</a></td>
        <td><a href="{{url("usuaris/esborrar",$usu->id)}}" class="btn btn-danger">Esborrar</a></td>
    </tr>
    @endforeach
</table>
@endsection