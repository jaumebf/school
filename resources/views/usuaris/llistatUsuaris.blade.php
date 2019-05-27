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

    <div class="col-md-9">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>

    <div class="col-md-10">
        <br>
        <h1 align='center'>Llista d'usuaris</h1>

        <div class="form-group {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password">
            @if($errors->has('password'))                  
            <strong>{{ $errors->first('password') }}</strong>                  
            @endif    
        </div>
        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%" align="center">
            <thead>
                <tr align="center">
                    <th class="th-sm">EMAIL</th>
                    <th class="th-sm">CONTRASENYA</th>
                    <th class="th-sm">ROL</th>
                    <th class="th-sm" colspan="2">OPERACIÓ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuaris as $usu)
                <tr align="center">
                    <td>{{$usu->email}}</td>   

                    <td>
                        <form method="POST" action="{{url('/usuaris/llistat')}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$usu->id}}">
                            <input type="password" name="password"> <input type="submit" value="Canviar" class="btn btn-info">                           
                        </form>
                    </td>                                 

                    @if ($usu->role == 1)
                    <td>Usuari normal</td>
                    @else
                    <td>Administrador</td>
                    @endif

                    @if ($usu->id != 1)
                    <td><a href="{{url("usuaris/canviarRol",$usu->id)}}" class="btn btn-info">Canviar rol</a></td>
                    <td><a href="{{url("usuaris/esborrar",$usu->id)}}" class="btn btn-danger">Esborrar</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>            
        
        <div class="row justify-content-center">
            <ul class="pagination">
                {{$usuaris->links()}}
            </ul>
        </div>
        
    </div>
</div>

@endsection