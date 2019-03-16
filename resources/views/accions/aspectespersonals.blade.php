<!-- Atencio diversitat -->
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
        <h1 align='center'>Valoració aspectes personals de l'alumne/a</h1>
        <br>
    </div>

    <div class="col-md-10">
        <form method="POST" action="{{url('alumnes/aspectespersonals')}}">
            @csrf            
            <input type="hidden" name="id" value="{{$asP->id}}">

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col">Molt bé</th>
                        <th scope="col">Bé</th>
                        <th scope="col">Acceptable</th>
                        <th scope="col">Té dificultats</th>
                        <th scope="col">Té moltes dificultats</th>                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Es mostra content/a i està motivat/ada per aprendre</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="motivacio" value="{{$i}}" @if($asP->motivacio == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Està atent/a i concentrat/ada a la classe</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="concentracio" value="{{$i}}" @if($asP->concentracio == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Fa un bon ús de l’agenda escolar</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="agenda" value="{{$i}}" @if($asP->agenda == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Mostra bona relació amb els/les companys/es</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="relacio" value="{{$i}}" @if($asP->relacio == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Fa aportacions i participa en el grup</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="participacio" value="{{$i}}" @if($asP->participacio == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Mostra bona relació amb els/les mestres i adults/es</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="relacioprofesor" value="{{$i}}" @if($asP->relacio_profesor == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Gestiona les seves emocions</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="emocions" value="{{$i}}" @if($asP->emocions == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Respecta les normes establertes</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="normes" value="{{$i}}" @if($asP->normes == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Té un comportament general adequat</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="comportament" value="{{$i}}" @if($asP->comportament == $i) checked @endif></td>
                        @endfor
                    </tr>

                    <tr>
                        <td scope="row">Arriba puntual a l’escola</td>
                        @for ($i=1; $i<=5; $i++)
                        <td scope="row"><input type="radio" name="puntualitat" value="{{$i}}" @if($asP->puntualitat == $i) checked @endif></td>
                        @endfor
                    </tr>
                </tbody>
            </table>
            <br>
            <button type="submit" class="btn btn-primary">Guardar Aspectes personals</button>
            </fieldset>
        </form>        
    </div>
</div>
@endsection
