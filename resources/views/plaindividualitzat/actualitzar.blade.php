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
        <h1 align='center'>Pla individualitzat</h1>
        <br>
    </div>

    <div class="col-md-10">
    <form method="POST" action="{{url('alumnes/actualitzar')}}">
    @csrf            
            <input type="hidden" name="id" value="{{$pla->id}}">
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->llengua == 1) checked @endif>
                <label class="form-check-label" for="llengua">
                  Llengua
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->llengua_castellana == 1) checked @endif>
                <label class="form-check-label" for="llengua_castellana">
                  Llengua castellana
                </label>                                        
            </div>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->llengua_inglesa == 1) checked @endif>
                <label class="form-check-label" for="llengua_inglesa">
                  Llengua inglesa
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->matematiques == 1) checked @endif>
                <label class="form-check-label" for="matematiques">
                  Matematiques
                </label>                                        
            </div>
                            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->cm_natural == 1) checked @endif>
                <label class="form-check-label" for="cm_natural">
                  CM Natural
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->cm_social == 1) checked @endif>
                <label class="form-check-label" for="cm_social">
                  CM social
                </label>                                        
            </div>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->ed_artistica == 1) checked @endif>
                <label class="form-check-label" for="ed_artistica">
                  Ed. Artistica
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->ed_fisica == 1) checked @endif>
                <label class="form-check-label" for="ed_fisica">
                  Ed. Física
                </label>                                        
            </div>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->religio == 1) checked @endif>
                <label class="form-check-label" for="religio">
                  Religio
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" value="" @if($pla && $pla->valors == 1) checked @endif>
                <label class="form-check-label" for="valors">
                  Valors
                </label>                                        
            </div>
               
                      
            <br>
            <button type="submit" class="btn btn-primary">Guardar Pla Individualitzat</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection
