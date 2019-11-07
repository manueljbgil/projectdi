@extends('layouts.bo')

@section('content')

    <h1 class="h3 mb-2 text-gray-800">{{ $user->name }}</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">
                    <img src="/images/user/profile.png">
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-4 py-3 border-left-primary">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">{{ __('E-Mail') }}</div>

                        <div class="col-md-9">
                            {{ $user->email }}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">Role</div>

                        <div class="col-md-9">

                            {{$user->role->name}}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3 text-black-50 text-md-right">Register Date</div>

                        <div class="col-md-9">

                            {{$user->created_at}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
