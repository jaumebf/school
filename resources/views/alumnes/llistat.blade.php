@extends('layouts.app')

@section('content')

@if(AUTH::user()->role != 1)
<ul class="nav justify-content-center"> 
    <li class="nav-item">
        <a class="nav-link active" href="{{ url("alumnes/alta") }}">Afegir alumne</a>
    </li>
</ul>
@endif
<div class="row justify-content-center">
    <div class="col-md-9">
        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
        @endif
    </div>
    
    <div class="col-md-9">
        <form method="POST" action="{{url('filtratge/')}}">
            @csrf
            <table cellpadding="10" align="center">                
                <tr align="center">
                    <td>
                        <label for="course">Curs</label>
                        <select class="form-control" name="course">
                            <option value=""></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option></option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>           
                        </select>  
                    </td>
                    <td>
                        <label for="class">Classe</label>
                        <select class="form-control" name="class">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>                   
                        </select>   
                    </td>
                    <td>
                        <label for="name">Nom</label>
                        <input class="form-control" type="text" name="name" value="">  
                    </td>
                    <td>
                        <label for="surname">Cognom</label>
                        <input class="form-control" type="text" name="surname" value="">     
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="4">
                        <input type="submit" class="btn btn-primary" value="Buscar">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <div class="col-md-10">
        <br>
        <h1 align='center'>Llista d'alumnes</h1>

        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">NOM</th>
                    <th class="th-sm">COGNOM</th>
                    <th class="th-sm">DNI</th>
                    <th class="th-sm">CURS</th>
                    <th class="th-sm">CLASSE</th>
                    <th class="th-sm">DATA DE NAIXEMENT</th>
                    <th class="th-sm" colspan="3">ACCIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnes as $alumne)
                <tr>
                    <td>{{$alumne->name}}</td>
                    <td>{{$alumne->surname}}</td>
                    <td>{{$alumne->dni}}</td>        
                    <td>{{$alumne->course}}</td>        
                    <td>{{$alumne->class}}</td>        
                    <td>{{$alumne->dob}}</td>
                    @if(AUTH::user()->role != 1)
                    <td><a href="{{url("alumnes/actualitzar",$alumne->id)}}">Actualitzar</a></td>
                    <td><a href="{{url("alumnes/esborrar",$alumne->id)}}">Esborrar</a></td>
                    @endif
                    <td><a href="{{url("alumnes/formulari",$alumne->id)}}">Notes</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="row justify-content-center">
            <ul class="pagination">
                {{$alumnes->links()}}
            </ul>
        </div>
    </div>

</div>
@endsection