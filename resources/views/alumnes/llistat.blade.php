@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    
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

    <div class="col-md-10">
        <br>
        <h1 align='center'>Llista d'alumnes</h1>

        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
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

    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="th-sm">Name
                </th>
                <th class="th-sm">Position
                </th>
                <th class="th-sm">Office
                </th>
                <th class="th-sm">Age
                </th>
                <th class="th-sm">Start date
                </th>
                <th class="th-sm">Salary
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
        </tbody>
    </table>

    <script>
    $(document).ready(function () {
        $('#dtBasicExample').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
    </script>

</div>
@endsection