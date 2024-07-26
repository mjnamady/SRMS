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

        return redirect()->route('manage.subjects')->with($notification);
    } // End method

    public function ManageSubjects(){
        $subjects = Subject::all();
        return view('backend.subject.manage_subjects_view', compact('subjects'));
    } // End method

    public function EditSubject($id){
        $subject = Subject::find($id);
        return view('backend.subject.edit_subject_view', compact('subject'));
    } // End method

    public function UpdateSubject(Request $request){
        $id = $request->id;
        Subject::where('id', $id)->update([
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
        ]);

        $notification = array(
            'message' => 'Subject Updated Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.subjects')->with($notification);
    } // End method
}
