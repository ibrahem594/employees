@extends('layouts.master')
@section('title','edit employees')
@inject('model','App\Employee')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{!! Form::model($emp,[

       'action'=>['EmployeeController@update',$emp->id],
      'method'=>'put'
      ]) !!}
<div class="form-group">
    <label for="first_name">first name</label>
    {!! Form::text('first_name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <label for="last_name">last name</label>
    {!! Form::text('last_name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <label for="dept">department</label>
   {!! Form::text('dept',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <label for="phone">phone number</label>
    {!! Form::text('phone',null,['class'=>'form-control'])!!}
</div>

<div class="form-group">
    <button class="btn btn-primary">edit now</button>
</div>

{!! Form::close() !!}

    @endsection
