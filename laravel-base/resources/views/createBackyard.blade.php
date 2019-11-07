@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Backyard</h1>
        <br>
        {!! Form::open(['action' => 'BackyardController@store','method' => 'POST','files' => true]) !!}
            <div class="form-group"> 
                {{Form::label('Name', 'Backyard Name')}}
                {{Form::Text('name','',['class' => 'form-control','placeholder' => 'Name']) }}
            </div>
            <div class="form-group"> 
                    {{Form::label('Description', 'Backyard Description')}}
                    {{Form::Textarea('description','',['class' => 'form-control','placeholder' => 'Description']) }}
            </div>
            <div class="form-group"> 
                    {{Form::label('Image', 'Backyard Image')}}
                    {{Form::file('image',['class' => 'form-control','placeholder' => 'Name']) }}
            </div>
            {{Form::submit('Submit',['class' => 'btn btn-dark btn-sm'])}}
        {!! Form::close()!!}
    </div>
@endsection