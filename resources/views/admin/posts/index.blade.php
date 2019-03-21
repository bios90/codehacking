@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>Posts</h1>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Category Id</th>
                <th>Photo Id</th>
                <th>Title</th>
                <th>Body</th>
                <th>Post link</th>
                <th>Comments</th>
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
                        <td>{{$post->category ? $post->category->name : "Uncategorized"}}</td>
                        {{--@if($post->photo->id)--}}
                            {{--<td class="text-center"><img height="32" src="{{ $post->photo->file}}"></td>--}}
                        {{--@else--}}
                            {{--<td class="text-center"><img height="32" src="https://picsum.photos/200/?random&dummy=32525"></td>--}}
                        {{--@endif--}}
                        <td><img height="32" src="{{$post->photo ? $post->photo->file : "https://picsum.photos/200/?random&dummy=32525"}}" alt=""></td>
                        <td>{{$post->photo->id}}</td>
                        {{--<td>{{$post->title}}</td>--}}
                        <td><a href="{{route('admin.posts.edit',['posts'=>$post->id])}}">{{$post->title}}</a></td>
                        <td>{{str_limit($post->body,50)}}</td>
                        <td><a href="{{route('home.post',$post->slug)}}">View Post</a></td>
                        <td><a href="{{route('admin.comments.show',$post->id)}}">View Comments</a></td>
                        <td>{{$post->created_at->diffForHumans()}}</td>
                        <td>{{$post->updated_at->diffForHumans()}}</td>
                    </tr>

                @endforeach

            @endif

            </tbody>

        </table>
    </div>


    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>


@stop