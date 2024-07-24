<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\classes;

class ClassesController extends Controller
{
    public function CreateClass(){
        return view('backend.class.create_class_view');
    } // end method

    public function StoreClass(Request $request){
        $class = new classes();
        $class->class_name = $request->class_name;
        $class->section = $request->section;
        $class->save();

        $notification = array(
            'message' => 'Student Class Created Successfully!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    } // end method

    public function ManageClasses(){
        $classes = classes::all();
        return view('backend.class.manage_classes_view', compact('classes'));
    } // end method
}
