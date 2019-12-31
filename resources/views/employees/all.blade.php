@extends('layouts.master')
@section('title','all employees')
@section('content')

        @include('flash::message')

        <a href="{{url(route('employees.create'))}}" class="btn btn-primary"><li class="fa fa-plus"></li>new employee</a>


<table class="table">
    <tr>
        <th>id</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>department</th>
        <th>phone</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
    <tbody>
    @foreach($employees as $employee)
    <tr>
        <td>{{$employee->id}}</td>
        <td>{{$employee->first_name}}</td>
        <td>{{$employee->last_name}}</td>
        <td>{{$employee->dept}}</td>
        <td>{{$employee->phone}}</td>
        <td><a href="{{ url(route('employees.edit',$employee->id)) }}" class="btn btn-info">edit</a></td>
        <td class="text-center">
            {!! Form::open([
            'action'=>['EmployeeController@destroy',$employee->id],
            'method'=>'delete'
            ]
            ) !!}
            <button type="submit" class="btn btn-danger btn-xs"><li class=""fa fa-trash-o></li> delete</button>
            {!!Form::close() !!}
        </td>

    </tr>

        @endforeach
    </tbody>

</table>
    </div>
@endsection
