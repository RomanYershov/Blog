@extends('layouts.app')
@section('content')

<div class="container">
    <table class="table table-striped task-table">
        <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Salary</th>
            <th>Position</th>
        </tr>
        <tr>

            <td>{{$emp->name}}</td>
            <td>{{$emp->surname}}</td>
            <td>{{$emp->salary}}</td>
            <td>{{$emp->position}}</td>
        </tr>
    </table>
    <a href="/employees" class="btn btn-success">back</a>
</div>

@endsection