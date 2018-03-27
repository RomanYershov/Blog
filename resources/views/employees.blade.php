@extends('layouts.app')
@section('content')
    <div class="container">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Employees
                    <a href="/employees?lang=en">en</a>
                    <a href="/employees?lang=ru">ru</a>
                    <a href="/employees?lang=kz">kz</a>
                </div>

                <div class="panel-body">
                    @if(session()->get("status"))
                        <div class="alert alert-success">
                            {{session()->get('status')}}
                        </div>
                    @endif
                    <table class="table table-striped task-table">
                        <thead>
                        <th>@lang("messages.Image")</th>
                        <th>@lang("messages.Name")</th>
                        <th>@lang("messages.Surname")</th>
                        <th>@lang("messages.Salary")</th>
                        <th>@lang("messages.Position")</th>
                        <th>&nbsp;</th>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)

                            <tr>
                                <td><img src="{{$employee->image}}" alt="" height="40px" width="40px"></td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->surname}}</td>
                                <td>{{$employee->salary}}</td>
                                <td>{{$employee->position}}</td>
                               <td>
                                   <form action="{{url('employees/'.$employee->id)}}" method="POST">
                                       {{csrf_field()}}
                                       {{method_field('DELETE')}}
                                       <button type="submit" class="btn btn-danger">delete</button>
                                        <a href="/employees/{{$employee->id}}" class="btn btn-info">More</a>
                                        <a href="/employees/{{$employee->id}}/edit" class="btn btn-warning">Edit</a>
                                   </form>
                               </td>

                            </tr>
                        @endforeach
                        <a href="/employees/create" class="btn btn-success">Add employee</a>
                        <a href="/fired" class="btn btn-danger">Show fired</a>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

