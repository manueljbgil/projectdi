@extends('layouts.app')

@section('content')
    <div class="container">
    <h1>Edit Plantation "{{$plantation->name}}"</h1>
        <br>
        {!! Form::open(['action' => ['PlantationController@update',$plantation->id],'method' => 'POST','files' => true]) !!}
        <div class="row">
            <div class="form-group col-md-8"> 
                    {{Form::label('Name', 'Plant Name')}}
                    {{Form::Text('name',$plantation->name,['class' => 'form-control','placeholder' => 'Name']) }}
            </div>
            <div class="form-group col-md-4">
                {{Form::label('Date', 'Plantation Date')}}
                {{Form::date('planted_at',$plantation->planted_at,[ 'class' => 'form-control' , \Carbon\Carbon::now()]) }}
            </div>
        </div>    
        <div class="form-group">
            {{ Form::label('Type', 'Plant Type')}}
            {{ Form::select('type_id',$types,$plantation->type_id,['class' => 'form-control']) }}
        </div>
        <div class="form-group"> 
            {{Form::label('Description', 'Backyard Description')}}
            {{Form::Textarea('description',$plantation->description,['class' => 'form-control','placeholder' => 'Description']) }}
        </div>
            {{ Form::hidden('backyard_id', $plantation->backyard_id) }}
            {{Form::hidden('_method','PUT')}}
            {{Form::submit('Submit',['class' => 'btn btn-dark btn-sm'])}}
        {!! Form::close()!!}
    </div>
@endsection

