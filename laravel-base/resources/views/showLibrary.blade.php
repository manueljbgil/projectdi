@extends('layouts.showPlant')

@section('content1')
<div class="container">
        <div class="row">
            @foreach($imageslib as $im)
                <div class="col-sm-4">
                        <div class="card">
                            <img src="/uploads/{{$im->path}}" class="card-img-top"/>
                            <div class="card-body">
                                <div class="col-md-6">
                                    <div class="btn-group" role="group">
                                            <a class="btn btn-dark btn-sm float-left"  href="/plantations/{{$plantation->id}}/edit"> Edit </a>
                                    </div>
                                    <div class="btn-group" role="group">
                                            {!! Form::open(['action' => ['ImageController@destroy',$im->id],'method' => 'POST']) !!}
                                                {{ Form::hidden('_method','DELETE') }}
                                                {{ Form::submit('Delete',['class' => 'btn btn-danger btn-sm']) }}
                                            {!! Form::close()!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            @endforeach
        </div>
</div>
@endsection