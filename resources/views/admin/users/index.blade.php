@extends('layouts.admin')


@section('content')

    <h1>Users</h1>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <tbody>


            @if($users)

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td class="text-center"><img height="32" src="{{ $user->photo ? $user->photo->file : "https://picsum.photos/200/?random"}}"></td>
                        <td><a href="{{route('admin.users.edit',['users'=>$user->id])}}">{{$user->name}}</a></td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->is_active == 1 ? 'Active' : 'Not active'}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach


            @endif


            </tbody>
        </table>

    </div>


@stop
