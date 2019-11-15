@extends('layouts.app')

@section('content')
<div class="container">
        <h1>New Image</h1>
        <br>
        {!! Form::open(['action' => 'ImageController@store','method' => 'POST','files' => true]) !!}
            <div class="form-row">
                <div class="col-7"> 
                        {{Form::file('path',['class' => 'form-control','placeholder' => 'Name', 'id'=> 'exampleFormControlFile1', 'onchange' => 'document.getElementById("blah").src = window.URL.createObjectURL(this.files[0])']) }}
                </div>
                <div class="col">
                    <img id="blah" alt="your image" class="img-fluid img-thumbnail rounded " />
                </div>
                {{ Form::hidden('library_id', $library) }}
            </div>
            <br>
            <div class="form-row">
                <div class="col-7">
                        {{Form::submit('Submit',['class' => 'btn btn-dark btn-sm'])}}
                        {!! Form::close()!!}
                 </div>
            </div>        
</div>
<hr>
@endsection
