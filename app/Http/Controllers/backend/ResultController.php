<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\classes;
use App\Models\Student;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function AddResult(){
        $classes = classes::all();
        return view('backend.result.add_result_view', compact('classes'));
    } // End method

    public function FetchStudent(Request $request){
        $class_id = $request->class_id;
        $students = Student::where('class_id', $class_id)->get();
        $std_data = '<option>-- Select a Student --</option>';
        foreach($students as $student){
            $std_data .= '<option value="'.$student->id.'">'.$student->name.' | '.$student->roll_id.'</option>';
        }

        $class = classes::with('subjects')->where('id', $class_id)->first();
        $class_subjects = $class->subjects;
        for ($i=0; $i < count($class_subjects); $i++) { 
            $subject_data[$i] = '<label for="english">'.$class_subjects[$i]->subject_name.'</label>
                    <input class="form-control" name="subject_ids[]" type="hidden" value="'.$class_subjects[$i]->id.'" >
                    <input class="form-control" name="marks[]" required type="text" placeholder="Enter mark out of 100">';
        }

        return response()->json(['students'=>$std_data, 'subjects'=>$subject_data]);
    } // End method
}
