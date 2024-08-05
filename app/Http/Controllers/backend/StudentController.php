<?php

namespace App\Http\Controllers\backend;

use App\Models\classes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

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

        return redirect()->back()->with($notification);
    } // End method
}
