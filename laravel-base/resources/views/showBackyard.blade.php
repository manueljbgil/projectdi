@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
                <div class="jumbotron jumbotron-fluid" style="background-image: url(/uploads/{{$backyardName->image}}); background-size: 120%;">
                        <div class="container">
                            <h1 class="display-4">{{$backyardName->name}}</h1>
                            <p class="lead">{{$backyardName->description}}</p>
                        </div>
                </div>    
                
        </div>

        <div class="container">
            <a class="btn btn-dark btn-sm"  href="/plantations/create/{{$backyardName->id}}"> Add a new Plant + </a>
            <br>
        </div>

        <div class="container">
            <br>
            <div class="row">
                @foreach($backyardPlantations as $plantation)
                    <div class="col-sm-4">
                        <div class="card">
                            <a href="/plantations/{{$plantation->id}}"> <img src="/uploads/{{$plantation->image}}" class="card-img-top" ></a>
                            <div class="card-body">
                                <h5 class="card-title"><a href="/plantations/{{$plantation->id}}">{{$plantation->name}}</a></h5>
                                <p class="card-text">{{$plantation->description}}</p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group" role="group">
                                                <a class="btn btn-dark btn-sm float-left"  href="/plantations/{{$plantation->id}}/edit"> Edit </a>
                                        </div>
                                        <div class="btn-group" role="group">
                                                {!! Form::open(['action' => ['PlantationController@destroy',$plantation->id],'method' => 'POST']) !!}
                                                    {{ Form::hidden('_method','DELETE') }}
                                                    {{ Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) }}
                                                {!! Form::close()!!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">planted at {{$plantation->planted_at}}</small>
                            </div>
                        </div>
                        <br>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection