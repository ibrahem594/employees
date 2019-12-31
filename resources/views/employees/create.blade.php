@extends('layouts.master')
@inject('model','App\Employee')
@section('title','new employees')
<div class="row">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@section('content')
    {!! Form::model($model,['action'=>'EmployeeController@store',
    'method'=>'post']) !!}
    <div class="form-group">
        <label for="first_name">first name</label>
        {{ Form::text('first_name',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        <label for="last_name">last name</label>
        {{ Form::text('last_name',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        <label for="dept">department</label>
        {{ Form::text('dept',null,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        <label for="phone">phone number</label>
        {{ Form::text('phone',null,['class'=>'form-control'])}}
    </div>

    <div class="form-group">
        <button class="btn btn-primary">submit</button>
    </div>

    {!! Form::close() !!}

@endsection
