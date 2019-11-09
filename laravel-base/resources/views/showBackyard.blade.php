@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

                <div class="jumbotron jumbotron-fluid" style="background-image: url(/uploads/{{$backyardName->image}}); background-size: 120%;">
                        <div class="container">
                            <h1 class="display-4">{{$backyardName->name}}</h1>
                            <p class="lead">{{$backyardName->description}}</p>
                        </div>
                </div>    
                
        </div>
    </div>
</div>
@endsection