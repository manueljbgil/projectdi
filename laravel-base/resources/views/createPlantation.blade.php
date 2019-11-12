@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>New Plant</h1>
        <br>
        {!! Form::open(['action' => 'PlantationController@store','method' => 'POST','files' => true]) !!}
            <div class="form-row">
                <div class="form-group col-md-8"> 
                    {{Form::label('Name', 'Plant Name')}}
                    {{Form::Text('name','',['class' => 'form-control','placeholder' => 'Name']) }}
                </div>
                <div class="form-group col-md-4">
                        {{Form::label('Date', 'Plantation Date')}}
                        {{Form::date('planted_at','',[ 'class' => 'form-control' , \Carbon\Carbon::now()]) }}
                </div>
            </div>
            <div class="form-group">
                    {{ Form::label('Type', 'Plant Type')}}
                    {{ Form::select('type_id',$types,'',['class' => 'form-control']) }}
            </div>
            <div class="form-group"> 
                    {{Form::label('Description', 'Backyard Description')}}
                    {{Form::Textarea('description','',['class' => 'form-control','placeholder' => 'Description']) }}
            </div>
            {{ Form::hidden('backyard_id', $backyard) }}
            {{Form::submit('Submit',['class' => 'btn btn-dark btn-sm'])}}
        {!! Form::close()!!}
    </div>
@endsection 