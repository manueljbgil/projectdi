@extends('layouts.app')

@section('content')
<div class="container">
    <a class="btn btn-dark btn-sm"  href="/backyards/create"> Create a new Backyard + </a>
</div>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach($backyards as $backyard)
                <div class="card">
                    <div class="card-header">
                        <h1><a href="/backyards/{{$backyard->id}}">{{$backyard->name}}</a></h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>{{$backyard->description}}</h3>
                                <p>Created at {{$backyard->created_at}} by {{$backyard->user->name}}</p>
                                <div class="btn-group" role="group">
                                        <a class="btn btn-dark btn-sm float-left"  href="/backyards/{{$backyard->id}}/edit"> Edit </a>
                                </div>
                                <div class="btn-group" role="group">
                                    {!! Form::open(['action' => ['BackyardController@destroy',$backyard->id],'method' => 'POST']) !!}
                                        {{ Form::hidden('_method','DELETE') }}
                                        {{ Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) }}
                                    {!! Form::close()!!}
                                </div>
                            </div>
                            <div class="col-md-6" >       
                                <img class="img-fluid img-thumbnail rounded float-right" src="/uploads/{{$backyard->image}}" {{$backyard->title}} >
                            </div>
                        </div>
                        
                    </div>
                </div>
                <br>
            @endforeach
        </div>
    </div>
</div>
@endsection
