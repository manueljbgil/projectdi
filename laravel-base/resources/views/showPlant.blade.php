@extends('layouts.app')

@section('content')
<div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($images as $key => $image)
                                    <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                        <img src="/uploads/{{$image->path}}" style="width:100%;max-height:100%;margin:auto;" alt="">
                                        <div class="carousel-caption d-none d-md-block">
                                        <h5>{{$plantation->name}} ({{$key+1}}/{{count($images)}})</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                    </div>
                </div>
                <div class="col-md">
                    <h3>{{$plantation->name}} - <cite title="Source Title">{{$plantation->type->name}}</cite></h3>
                    <div class="col-md-6">
                        <h6 class="card-title">{{$plantation->description}}</h6>
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">Planted at {{$plantation->planted_at}}</footer>
                            <br>
                        </blockquote>
                        <a href="#" class="btn btn-dark btn-sm">Add Image + </a>
                        <div class="btn-group" role="group">
                            {!! Form::open(['action' => ['PlantationController@destroy',$plantation->id],'method' => 'POST']) !!}
                                {{ Form::hidden('_method','DELETE') }}
                                {{ Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) }}
                            {!! Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            
            
        </div>
</div>
@endsection