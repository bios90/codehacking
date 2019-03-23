@extends('layouts.admin')

@section('content')


    <h1>Media</h1>

    @if($photos)

        <form action="delete/media" method="post" class="form-inline">

            {{csrf_field()}}

            {{method_field('delete')}}

            <div class="form-group">
                <select name="checkBoxArray" id="" class="form-control">
                    <option value="">Delete</option>
                </select>

                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary ">
                </div>
            </div>

            <div class="form-group">

            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th><input type="checkbox" id="options"></th>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>

                @foreach($photos as $photo)

                    <tr>
                        <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}">
                        </td>
                        <td>{{$photo->id}}</td>
                        <td><img height="72" src="{{$photo->file}}" alt=""></td>
                        <td>{{$photo->created_at? $photo->created_at : 'no date'}}</td>

                        <td>

                            {{--<input type="hidden" name="photo" value="{{$photo->id}}">--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="submit" name="delete_single" value="Delete" class="btn btn-danger">--}}
                            {{--</div>--}}
                            

                        </td>


                    </tr>

                @endforeach

                </tbody>
            </table>

        </form>

    @endif

@section('scripts')
    <script>
        $(document).ready(function ()
        {
            $('#options').click(function ()
            {
                if(this.checked)
                {
                    $('.checkBoxes').each(function ()
                    {
                       this.checked = true;
                    });
                }
                else
                    {
                        $('.checkBoxes').each(function ()
                        {
                            this.checked = false;
                        });
                    }
            });
        });
    </script>
@stop


@stop