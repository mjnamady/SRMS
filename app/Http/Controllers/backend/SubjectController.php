<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function CreateSubject(){
        return view('backend.subject.create_subject_view');
    } // End method

    public function StoreSubject(Request $request){
        Subject::create([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code
        ]);

        $notification = array(
            'message' => 'Subject Created Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // End method
}
