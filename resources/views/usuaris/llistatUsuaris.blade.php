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
        <table id="tpart" class="table table-striped">
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

                <td><a href="{{url("usuaris/canviarRol",$usu->id)}}" class="btn btn-info">Canviar rol</a></td>
                <td><a href="{{url("usuaris/esborrar",$usu->id)}}" class="btn btn-danger">Esborrar</a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<link href="{{ asset('MDB-Free_4.7/js/jquery-3.3.1.min.js') }}" rel="script">
<link href="{{ asset('MDB-Free_4.7/js/mdb.js') }}" rel="script">
<link href="{{ asset('MDB-Free_4.7/js/mdb.min.js') }}" rel="script">
<link href="{{ asset('MDB-Free_4.7/js/addons/datatables.min.js') }}" rel="script">
<link href="{{ asset('MDB-Free_4.7/js/addons/datatables-select.min.js') }}" rel="script">


<script>
$(document).ready(function () {
    $('#tpart').DataTable({
        pagingType: "full_numbers" // "simple" option for 'Previous' and 'Next' buttons only
        //autoWidth: true
    });
    $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection