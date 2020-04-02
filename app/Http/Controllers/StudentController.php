<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
class StudentController extends Controller
{
    public function student(){
        return view('crudWithEORM.create');
    }
    public function storeStudent(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'max:25','min:4'],
            'phone' => ['required', 'unique:students', 'max:15','min:9'],
            'email' => ['required', 'unique:students', 'max:25','min:4'],
        ]);

        $student = new Student;
        $student->name=$request->name;
        $student->phone=$request->phone;
        $student->email=$request->email;
        $student->save();
        $notification=array(
            'message' => 'Successfully Category Inserted',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function allStudent(){
        $student = Student::all();
        return view('crudWithEORM.viewAllStudent',compact('student'));
    }

    public function singleStudentView($id){
        //DB::table('students')->where('id',$id)->first();
        $student=Student::findorfail($id);
        return view('crudWithEORM.singleStudentView',compact('student'));
    }
    public function singleStudentDelete($id){
        //DB::table('students')->where('id',$id)->delete();
        $student=Student::find($id);
        $student->delete();
        $notification=array(
            'message' => 'Successfully Deleted',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
    public function singleStudentEdit($id){
        $student = Student::findorfail($id);
        return view('crudWithEORM.singleStudentEdit',compact('student'));
    }
    public function singleStudentUpdate(Request $request,$id){
        $student = Student::findorfail($id);
        $student->name=$request->name;
        $student->phone=$request->phone;
        $student->email=$request->email;
        $student->save();
        $notification=array(
            'message' => 'Successfully Updated',
            'alert-type' => 'success',
        );
        return Redirect()->route('allStudent')->with($notification);
    }
}
