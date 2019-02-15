@extends('layouts.app')

@section('content')
<li class="nav-item dropdown"><a href="{{ url('/alumnes') }}"><h3>Alumnes &nbsp;</h3></a></li>
<li class="nav-item dropdown"> <a href="{{ url('/professors') }}"><h3>Professors &nbsp; </h3></a></li>
<li class="nav-item dropdown"><a href="{{ url('/operacions') }}"><h3>Operacions &nbsp;</h3></a></li>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
