<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $employees=Employee::all();
       return view('employees.all',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $rules=[
           'first_name'=>'required',
           'last_name'=>'required',
           'dept'=>'required',
           'phone'=>'required',

       ];
       $message=[
           'first_name.required'=>'first_name is required',
           'last_name.required'=>'last_name is required',
           'dept.required'=>'dept is required',
           'phone.required'=>'phone is required'
       ];
       $this->validate($request,$rules,$message);

        $o=new Employee;
        $o->first_name=$request->input('first_name');
        $o->last_name=$request->input('last_name');
        $o->dept=$request->input('dept');
        $o->phone=$request->input('phone');
        //dd($request->all());
        $o->save();
        flash()->success("created successfully");
        return redirect(route('employees.index'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $emp=Employee::findorfail($id);
        return view('employees.edit',compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     $employees=Employee::findorfail($id);
     $employees->first_name=$request->input('first_name');
        $employees->last_name=$request->input('last_name');
        $employees->dept=$request->input('dept');
        $employees->phone=$request->input('phone');
        $employees->save();
        //dd($employees);
        flash()->success("updated successfully");
        return redirect(route('employees.index',$employees->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        flash()->success('deleted successfully');
        return redirect(route('employees.index'));
    }
}
