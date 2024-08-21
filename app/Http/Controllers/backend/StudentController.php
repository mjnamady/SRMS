<?php

namespace App\Http\Controllers\backend;

use App\Models\classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Result;

class StudentController extends Controller
{
    public function AddStudent(){
        $classes = classes::get();
        return view('backend.student.add_student_view', compact('classes'));
    } // End method

    public function StoreStudent(Request $request){
        $student = new Student();
        $student->name = $request->full_name;
        $student->email = $request->email;
        $student->roll_id = $request->roll_id;
        $student->class_id = $request->class_id;
        $student->dob = $request->dob;
        $student->gender = $request->gender;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $imageName = date('YmdHi').'.'.$file->getClientOriginalName(); // 20240202.admin.png
            $file->move(public_path('uploads/student_photos'), $imageName);
            $student['photo'] = $imageName;
        }

        $student->save();

        $notification = array(
            'message' => 'Student Added Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.students')->with($notification);
    } // End method

    public function ManageStudent(){
        $students = Student::all();
        return view('backend.student.manage_student_view', compact('students'));
    } // End method

    public function EditStudent($id){
        $student = Student::find($id);
        $classes = classes::all();
        return view('backend.student.edit_student_view', compact('student', 'classes'));
    } // End method

    public function UpdateStudent(Request $request){
        $id = $request->id;
        $student = Student::find($id);
        $student->name = $request->full_name;
        $student->email = $request->email;
        $student->roll_id = $request->roll_id;
        $student->class_id = $request->class_id;
        $student->dob = $request->dob;
        $student->gender = $request->gender;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            @unlink(public_path('uploads/student_photos/'.$student->photo));
            $imageName = date('YmdHi').'.'.$file->getClientOriginalName(); // 20240202.admin.png
            $file->move(public_path('uploads/student_photos'), $imageName);
            $student['photo'] = $imageName;
        }

        $student->save();

        $notification = array(
            'message' => 'Student Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.students')->with($notification);
    } // End method

    public function DeleteStudent($id){
        $student = Student::find($id);
        @unlink(public_path('uploads/student_photos/'.$student->photo));
        Result::where('student_id', $student->id)->delete();
        $student->delete();
        $notification = array(
            'message' => 'Student Deleted Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End method
}
