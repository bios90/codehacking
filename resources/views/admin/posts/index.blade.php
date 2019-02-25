@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>User Id</th>
                <th>Category Id</th>
                <th>Photo Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
            </thead>
            <tbody>

            @if($posts)

                @foreach($posts as $post)

                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category_id}}</td>
                        {{--@if($post->photo->id)--}}
                            {{--<td class="text-center"><img height="32" src="{{ $post->photo->file}}"></td>--}}
                        {{--@else--}}
                            {{--<td class="text-center"><img height="32" src="https://picsum.photos/200/?random&dummy=32525"></td>--}}
                        {{--@endif--}}
                        <td><img height="32" src="{{$post->photo ? $post->photo->file : "https://picsum.photos/200/?random&dummy=32525"}}" alt=""></td>
                        <td>{{$post->photo->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->body}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach

            @endif

            </tbody>

        </table>
    </div>
@stop