@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @foreach($trees as $tree)
                    <div class="card">
                
                        <div class="card-header">{{$tree->name}}</div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>{{$tree->planted_at}}</p>
                                    <p>{{$tree->description}}</p>
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