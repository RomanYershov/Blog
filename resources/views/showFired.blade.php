@extends('layouts.app')
@section('content')

    <div class="container">
        <table class="table table-striped task-table">
            <tr>
                <th>Name</th>
                <th>Surname</th>
                <th>Salary</th>
                <th>Position</th>
                <th>Deleted</th>
            </tr>

                  @foreach($emp as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->surname}}</td>
                    <td>{{$item->salary}}</td>
                    <td>{{$item->position}}</td>
                    <td>{{$item->deleted_at}}</td>
                </tr>
                    @endforeach

        </table>
        <a href="/employees" class="btn btn-success">back</a>
    </div>
{{$emp->links()}}
@endsection