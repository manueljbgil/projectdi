@extends('layouts.bo')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1 class="h3 mb-2 text-gray-800">Users</h1>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('user.create') }}">
                <button class="btn btn-primary">Add new</button>
            </a>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-page-length="25">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Register date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Register date</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr @if($loop->index%2 == 0)class="bg-light"@endif>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}">
                                    <button class="btn btn-primary btn-circle btn-sm"><i class="fa fa-eye"></i></button>
                                </a>

                                @if($user->role_id >= Auth::user()->role_id && !$user->deleted_at)
                                    <a href="{{ route('user.edit', $user->id) }}"><button class="btn btn-success btn-circle btn-sm"><i class="fa fa-edit"></i></button></a>

                                <form style="display: inline-block" method="post" action="{{ route('user.destroy', $user->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
