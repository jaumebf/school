<!-- Atencio diversitat -->
@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <ul class="nav justify-content-center"> 
        <li class="nav-item">
            <a class="nav-link active" href="{{ url("alumnes/llistat") }}">Llistar alumnes</a>
        </li>
    </ul>        

    <div class="col-md-4">
        <br>
        <h1 align='center'>Mesures d'atenció a la diversitat</h1>
        <br>
    </div>

    <div class="col-md-10">
        <form method="POST" action="{{url('alumnes/atenciodiversitat')}}">
            @csrf            
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
            <button type="submit" class="btn btn-primary">Guardar Atenció diversitat</button>
            </fieldset>
        </form>        
    </div>
</div>
@endsection
