@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/employees/{{$emp->id}}" method="POST" class="form-horizontal">
        {{csrf_field()}}
        {{method_field('PUT')}}


        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Name</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{$emp->name}}" >
            </div>
        </div>
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Surname</label>
            <div class="col-sm-6">
                <input type="text" name="surname" id="task-name" class="form-control" value="{{$emp->surname}}" >
            </div>
        </div>
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Salary</label>
            <div class="col-sm-6">
                <input type="text" name="salary" id="task-name" class="form-control" value="{{$emp->salary}}">
            </div>
        </div>
        <div class="form-group">
            <label for="task-name" class="col-sm-3 control-label">Position</label>
            <div class="col-sm-6">
                <input type="text" name="position" id="task-name" class="form-control" value="{{$emp->position}}">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-btn fa-plus"></i>Update
                </button>
            </div>
        </div>
    </form>
</div>

@endsection