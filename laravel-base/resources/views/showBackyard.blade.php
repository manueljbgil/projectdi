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
                @foreach($backyardTrees as $tree)
                    <div class="card">
                
                        <!--<a href="/backyards/{$tree->id}">-->
                        
                        <div class="card-header">{{$tree->name}}</a></div>

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
                @foreach($backyardPlants as $plant)
                <div class="card">
            
                    <!--<a href="/backyards/{$tree->id}">-->
                    
                    <div class="card-header">{{$plant->name}}</a></div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p>{{$plant->planted_at}}</p>
                                <p>{{$plant->description}}</p>
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