<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\classes;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Result;


class StudentResultController extends Controller
{
    public function index(){
        $classes = classes::all();
        return view('frontend.index', compact('classes'));
    } // End method

    public function SearchResult(Request $request){
        $roll_id = $request->roll_id;
        $class_id = $request->class_id;
        $student = Student::where('roll_id', $roll_id)->where('class_id', $class_id)->first();

        if(!$student){
            $notification = array(
                'message' => 'Invalid Student Credentials!',
                'alert-type' => 'error'
            );
    
            return redirect()->back()->with($notification);
        }

        $result = Result::where('student_id', $student->id)->get();
        if(count($result) === 0){
            $notification = array(
                'message' => 'Sorry Result Not Declared Yet!',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
        }

        return view('frontend.student_result', compact('result'));
    } // End method
}
