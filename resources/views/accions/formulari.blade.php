<!-- Atencio diversitat -->
@extends('layouts.app')
@section('content')

<ul class="nav justify-content-center"> 
    <li class="nav-item">
        <a class="nav-link active" href="{{ url("alumnes/llistat") }}">Llistar alumnes</a>
    </li>
</ul>      

<form method="POST" action="{{url('alumnes/formulari')}}">
    <!-- Aspectes personals -->
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary">Guardar canvis</button>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <br>
            <h1 align='center'>Valoració aspectes personals de l'alumne/a</h1>
            <br>
        </div>

        <div class="col-md-10">
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
            </fieldset>
        </div>
    </div>
    <!-- FIN Aspectes personals -->

    <!-- Atenció diversitat -->
    <div class="row justify-content-center">
        <div class="col-md-4">
            <br>
            <h1 align='center'>Mesures d'atenció a la diversitat</h1>
            <br>
        </div>

        <div class="col-md-10">
            <input type="hidden" name="id" value="{{$atencio->id}}">

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="ed_especial" type="checkbox" value="1" @if($atencio && $atencio->ed_especial == 1) checked @endif>
                       <label class="form-check-label" for="ed_especial">
                    Aula d'educació especial
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="acollida" type="checkbox" value="1" @if($atencio && $atencio->acollida == 1) checked @endif>
                       <label class="form-check-label" for="acollida">
                    Acollida
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="suport_linguistic" type="checkbox" value="1" @if($atencio && $atencio->suport_linguistic == 1) checked @endif>
                       <label class="form-check-label" for="suport_linguistic">
                    Suport lingüístic
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="sep" type="checkbox" value="1" @if($atencio && $atencio->sep == 1) checked @endif>
                       <label class="form-check-label" for="sep">
                    SEP o grup de reforç
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="vetllador" type="checkbox" value="1" @if($atencio && $atencio->vetllador == 1) checked @endif>
                       <label class="form-check-label" for="vetllador">
                    Vetllador/a
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="at_individual" type="checkbox" value="1" @if($atencio && $atencio->at_individual == 1) checked @endif>
                       <label class="form-check-label" for="at_individual">
                    Atenció individual
                </label>                                        
            </div>                            

            <br>
            </fieldset>
        </div>
    </div>
    <!-- FIN Atenció diversitat -->

    <!-- Pla individualitzat -->
    <div class="row justify-content-center">
        <div class="col-md-4">
            <br>
            <h1 align='center'>Àrees amb pla individualitzat</h1>
            <br>
        </div>

        <div class="col-md-10">           
            <input type="hidden" name="id" value="{{$pla->id}}">

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="llengua" type="checkbox" value="1" @if($pla && $pla->llengua == 1) checked @endif>
                       <label class="form-check-label" for="llengua">
                    Llengua
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="llengua_castellana" type="checkbox" value="1" @if($pla && $pla->llengua_castellana == 1) checked @endif>
                       <label class="form-check-label" for="llengua_castellana">
                    Llengua castellana
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="llengua_inglesa" type="checkbox" value="1" @if($pla && $pla->llengua_inglesa == 1) checked @endif>
                       <label class="form-check-label" for="llengua_inglesa">
                    Llengua anglesa
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="matematiques" type="checkbox" value="1" @if($pla && $pla->matematiques == 1) checked @endif>
                       <label class="form-check-label" for="matematiques">
                    Matemàtiques
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="cm_natural" type="checkbox" value="1" @if($pla && $pla->cm_natural == 1) checked @endif>
                       <label class="form-check-label" for="cm_natural">
                    CM Natural
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="cm_social" type="checkbox" value="1" @if($pla && $pla->cm_social == 1) checked @endif>
                       <label class="form-check-label" for="cm_social">
                    CM Social
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="ed_artistica" type="checkbox" value="1" @if($pla && $pla->ed_artistica == 1) checked @endif>
                       <label class="form-check-label" for="ed_artistica">
                    Ed. Artística
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="ed_fisica" type="checkbox" value="1" @if($pla && $pla->ed_fisica == 1) checked @endif>
                       <label class="form-check-label" for="ed_fisica">
                    Ed. Física
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="religio" type="checkbox" value="1" @if($pla && $pla->religio == 1) checked @endif>
                       <label class="form-check-label" for="religio">
                    Religió
                </label>                                        
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" name="valors" type="checkbox" value="1" @if($pla && $pla->valors == 1) checked @endif>
                       <label class="form-check-label" for="valors">
                    Valors
                </label>                                        
            </div>
            <br>
            </fieldset>       
        </div>
    </div>
    <!-- FIN Pla individualitzat -->


    <!-- Faltes -->
    <div class="row justify-content-center">
        <div class="col-md-4">
            <br>
            <h1 align='center'>Faltes d'assistència</h1>
            <br>
        </div>

        <div class="col-md-10">           
            <input type="hidden" name="id" value="{{$pla->id}}">

            <div class="form-group">

                <?php
                $arrayNumFaltes = [
                    "Cap",
                    "Menys de 5",
                    "Entre 5 i 10",
                    "Entre 10 i 20",
                    "Més de 20",
                    "Més de 30",
                    "Ha faltat quasi tot el trimestre"];
                ?>
                <label for="faltes">Faltes d’assistència durant aquest trimestre</label>
                <select class="form-control" name="faltes">
                    @for ($i=0; $i< sizeof($arrayNumFaltes); $i++)
                    <option value='{{$i+1}}'@if(isset($observacions) && $i+1==$observacions->faltes) selected @endif>{{$arrayNumFaltes[$i]}}</option>
                    @endfor
                </select>
            </div>

            <?php
            $arrayNumFaltesJust = [
                "Les faltes estan justificades",
                "Hi ha faltes sense justificar",
                "No s'han justificat les faltes",
                "Cap falta"];
            ?>
            <div class="form-group">
                <label for="numFaltesJust">Justificació</label>
                <select class="form-control" name="numFaltesJust"> 
                    @for ($i=0; $i< sizeof($arrayNumFaltesJust); $i++)
                    <option value='{{$i+1}}'@if(isset($observacions) && $i+1==$observacions->numfaltesJust) selected @endif>{{$arrayNumFaltesJust[$i]}}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="faltesComentaris">Comentaris</label>
                <input type="text" class="form-control" name="faltesComentaris" value="@if($observacions) {{$observacions->comentaris}} @endif">
            </div>

            <div class="form-group">
                <label for="observacions">Observacions</label>
                <textarea class="form-control" name="observacions">@if($observacions){{$observacions->observacions}}@endif</textarea>
            </div>

            <div class="form-group">
                <label for="dia">Dia de creació</label>
                <input type="text" class="form-control" name="dia" value="@if($observacions) {{$observacions->dia}} @endif">
            </div>
            <br>

            <div class="form-group">


                @foreach($alumneAssignatura as $alumneAssignatures)
                <h2><b>{{ $assignatures[$alumneAssignatures->assignatura_id-1]->nom }}</b></h2>
                <br>
                
                <table class="table table-bordered">
                    <tr>
                        <th><b>{{ $assignatures[$alumneAssignatures->assignatura_id-1]->nom }}</b></th>
                        <th>Primera Avaluació</th>
                        <th>Segona Avaluació</th>
                        <th>Tercera Avaluació</th>
                    </tr>
                    <tr>
                        <td>Té una bona actitud a classe</td>
                        <td>                        
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->actitud_1 }}" name="actitud1_{{$alumneAssignatures->assignatura_id}}">                    
                        </td>
                        <td>                        
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->actitud_2 }}" name="actitud2_{{$alumneAssignatures->assignatura_id}}">                    
                        </td>
                        <td>                        
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->actitud_3 }}" name="actitud3_{{$alumneAssignatures->assignatura_id}}">                    
                        </td>
                    </tr>
                    <tr>
                        <td>S'esforça</td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->esforc_1 }}" name="esforc1_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->esforc_2 }}" name="esforc2_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->esforc_3 }}" name="esforc3_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Acaba els treballs</td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->treball_1 }}" name="treball1_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->treball_2 }}" name="treball2_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->treball_3 }}" name="treball3_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                    </tr>
                    <tr>
                        <td>Fa els deures</td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->deures_1 }}" name="deures1_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                         <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->deures_2 }}" name="deures2_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->deures_3 }}" name="deures3_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                    </tr
                    <tr>
                        <td>Qualificació final</td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->qualificacio_1 }}" name="qualificacio1_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->qualificacio_2 }}" name="qualificacio2_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                        <td>
                            <input class="form-control" type="number" value="{{ $alumneAssignatures->qualificacio_3 }}" name="qualificacio3_{{$alumneAssignatures->assignatura_id}}">
                        </td>
                    </tr>
                </table>
                <br>
                @endforeach
            </div>
        </div>
    </div>
    <!-- FIN Faltes -->
    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary">Guardar canvis</button>
    </div>
</form>
@endsection
