<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::all();
        return view('crudResourceRoute.viewAllTeacher',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crudResourceRoute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:25','min:4'],
            'phone' => ['required', 'unique:students', 'max:15','min:9'],
            'email' => ['required', 'unique:students', 'max:25','min:4'],
        ]);

        $teacher = new Teacher;
        $teacher->name=$request->name;
        $teacher->phone=$request->phone;
        $teacher->email=$request->email;
        $teacher->save();
        $notification=array(
            'message' => 'Successfully Category Inserted',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher=Teacher::findorfail($id);
        return view('crudResourceRoute.singleTeacherView',compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findorfail($id);
        return view('crudResourceRoute.singleTeacherEdit',compact('teacher'));
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
        $teacher = Teacher::findorfail($id);
        $teacher->name=$request->name;
        $teacher->phone=$request->phone;
        $teacher->email=$request->email;
        $teacher->save();
        $notification=array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success',
        );
        return Redirect()->route('allStudent')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB::table('students')->where('id',$id)->delete();
        $teacher=Teacher::find($id);
        $teacher->delete();
        $notification=array(
            'message' => 'Successfully Deleted',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
}
