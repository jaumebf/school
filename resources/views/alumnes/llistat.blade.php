<a href="{{ url("alumnes/alta") }}">Afegir alumnes</a>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h1 align='center'>Llista de Alumnes</h1>
<table widht='90%' align='center' class="table table-dark">
    <tr>
        <th>CODI</th>
        <th>NOM</th>
        <th>COGNOM</th>
        <th>DNI</th>
        <th>COURSE</th>
        <th>Date of Birthday</th>
        <th colspan="2">Accions</th>
    </tr>
    
    @foreach($alumnes as $alumne)
    <tr>
        <td>{{$alumne->id}}</td>
        <td>{{$alumne->name}}</td>
        <td>{{$alumne->surname}}</td>
        <td>{{$alumne->dni}}</td>        
        <td>{{$alumne->course}}</td>        
        <td>{{$alumne->dob}}</td>        
        <td><a href="{{url("alumnes/actualitzar",$alumne->id)}}">Actualitzar</a></td>
        <td><a href="{{url("alumnes/esborrar",$alumne->id)}}">Esborrar</a></td>
    </tr>
    @endforeach
</table>

<ul class="pagination">
     {{$alumnes->links()}}
</ul>