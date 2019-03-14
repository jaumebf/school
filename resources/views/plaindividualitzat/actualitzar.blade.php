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
    <form method="POST" action="{{url('alumnes/plaindividualitzat')}}">
    @csrf            
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
                  Llengua inglesa
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="matematiques" type="checkbox" value="1" @if($pla && $pla->matematiques == 1) checked @endif>
                <label class="form-check-label" for="matematiques">
                  Matematiques
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
                  CM social
                </label>                                        
            </div>
            
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="ed_artistica" type="checkbox" value="1" @if($pla && $pla->ed_artistica == 1) checked @endif>
                <label class="form-check-label" for="ed_artistica">
                  Ed. Artistica
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
                  Religio
                </label>                                        
            </div>
               
            <div class="form-check form-check-inline">
                <input class="form-check-input" name="valors" type="checkbox" value="1" @if($pla && $pla->valors == 1) checked @endif>
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
