
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New Employee
                </div>

                <div class="panel-body">



                    <form action="/news" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Text</label>
                            <div class="col-sm-6">
                                <input type="text" name="text" id="task-name" class="form-control" >
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="name" type="file" class="form-control" name="image" value="{{ old('image') }}" required autofocus>

                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection