@extends('layouts.admin')



@section('content')

    <div class="row">
        <h1>Edit</h1>


        <div class="col-sm-3">

            <img src="{{$user->photo ? $user->photo->file : "https://picsum.photos/200/?random"}}"
                 class="img-responsive img-rounded" alt="">

        </div>


        <div class="col-sm-9">


            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name :'); !!}
                {!! Form::text('name', null,['class'=>'form-control']); !!}
            </div>


            <div class="form-group">
                {!! Form::label('email','Email :') !!}
                {!! Form::email('email',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id','Role  :') !!}
                {!! Form::select('role_id',[''=>'Choose options']+$roles,null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active','Status :') !!}
                {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),null,['id'=>'status_select','class'=>'form-control','style'=>'width:100%;']) !!}
            </div>


            <div class="form-group">
                {!! Form::label('photo_id', 'File :'); !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']); !!}
            </div>


            <div class="form-group">
                {!! Form::label('password', 'Password :'); !!}
                {!! Form::password('password',['class'=>'form-control']); !!}
            </div>

            <div class="col-sm-2" style="padding-left: 0">

                <div class="form-group">
                    {!! Form::submit('Update User',['class'=>'btn btn-primary']); !!}
                </div>

            </div>

            {!! Form::close() !!}


            <div class="col-sm-2 pull-right text-right" style="padding-right: 0;">

                {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete User',['class'=>'btn btn-danger']); !!}
                </div>

                {!! Form::close() !!}

            </div>


        </div>


        <div class="col-sm-12">
            @include('includes.form_error')
        </div>

    </div>



@stop