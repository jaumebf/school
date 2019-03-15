@extends('layouts.app')

@section('content')
<ul class="nav justify-content-center"> 
  <li class="nav-item">
    <a class="nav-link active" href="{{ url("alumnes/alta") }}">Afegir alumne</a>
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

    <div class="col-md-10">
        <br>
        <h1 align='center'>Llista de alumnes</h1>

        <table class="table table-striped">
            <tr>
                <th>NOM</th>
                <th>COGNOM</th>
                <th>DNI</th>
                <th>COURSE</th>
                <th>Date of Birthday</th>
                <th colspan="3">Accions</th>
            </tr>

            @foreach($alumnes as $alumne)
            <tr>
                <td>{{$alumne->name}}</td>
                <td>{{$alumne->surname}}</td>
                <td>{{$alumne->dni}}</td>        
                <td>{{$alumne->course}}</td>        
                <td>{{$alumne->dob}}</td>        
                <td><a href="{{url("alumnes/actualitzar",$alumne->id)}}">Actualitzar</a></td>
                <td><a href="{{url("alumnes/esborrar",$alumne->id)}}">Esborrar</a></td>
                <td><a href="{{url("alumnes/plaindividualitzat",$alumne->id)}}">Pla individualitzat</a></td>
                <td><a href="{{url("alumnes/atenciodiversitat",$alumne->id)}}">Atenció diversitat</a></td>
            </tr>
            @endforeach
        </table>

        <div class="row justify-content-center">
            <ul class="pagination">
                {{$alumnes->links()}}
            </ul>
        </div>
    </div>
</div>
@endsection