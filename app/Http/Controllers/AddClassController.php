<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddClass;
use App\Registerclass;
use Illuminate\Support\Facades\Auth;
use Session;


class AddClassController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        return view('admin/addclass');
    }
    public function registeredClass() {
        return view('premium/registeredClass');
    }

    public function createClass(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'desc' => 'required',
            'start' => 'required',
            'duration' => 'required',
            'material'  => 'required|mimes:jpeg,jpg,png,pdf|max:1999'
        ]);

        if ($request->hasfile('material')) {
            $file = $request->file('material');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $saveFile =  $file->move('upload/', $filename);
            if($saveFile){
                $class = new AddClass;
                $class->cl_user_id = '1';
                $class->cl_title = $request->input('title');
                $class->cl_description = $request->input('desc');
                $class->cl_material = $filename;
                $class->cl_start = $request->input('start');
                $class->cl_duration = $request->input('duration');
                $class->cl_zoom_link = $request->input('zoomLink');
                $class->save();
                return redirect('/classes')->with('success', 'New class record created');
            }else {
                return redirect('/classes')->with('error', 'An error occured while uploading file. Kindly try again.');
            }
        }else return redirect('/classes')->with('error', 'Invalid material provided.');        
    }

    // Show Edit classes page.
    public function editClass($class_id) {
        $class= AddClass::findOrFail($class_id);
        return view('admin/editclass',['classDetails'=>$class]);
    } 

    // Update classes
    public function updateClass(Request $request){
        $xclass= AddClass::findOrFail($request->input('cid'));
        if($xclass){
            if ($request->hasfile('material')) {
                $file = $request->file('material');
                $extension = $file->getClientOriginalExtension(); // getting image extension
                $filename =time().'.'.$extension;
                $saveFile =  $file->move('upload/', $filename);
            }
            $xclass->cl_user_id = $xclass->cl_user_id;
            $xclass->cl_title = $request->input('title');
            $xclass->cl_description = $request->input('desc');
            $xclass->cl_material = (!empty($saveFile)) ? $saveFile : $xclass->cl_material;
            $xclass->cl_start = $request->input('start');
            $xclass->cl_duration = $request->input('duration');
            $xclass->cl_zoom_link = $request->input('zoomLink');
            $xclass->cl_status = $request->input('status');
            $xclass->save();
            return redirect('/classes')->with('success', 'Class details edited successfully.');
        }else return redirect('/classes')->with('error', 'Invalid class selected.');
    } 
    
    public function deleteClass($class_id){
        $class= AddClass::findOrFail($class_id);
        $class->delete();
        return redirect('/classes')->with('success', 'Class details deleted successfully.');
    }


    public function activeClass($class_id) {
        $class= AddClass::findOrFail($class_id);
        $class_register= new Registerclass;
        $class_register->cr_class_id = $class_id;
        $class_register->cr_user_id = Auth::user()->id;
        $class_register->cr_status = 'active';
        $class_register->cr_date_attended = date('Y-m-d H:i:s');
        $class_register->save();

        Session::flash('classDetails', $class); 
        return redirect('/registeredClass')->with('success', 'You have successfully registed for the class.');
    } 

    public function passiveClass($class_id) {
        $class= AddClass::findOrFail($class_id);
        $class_register= new Registerclass;
        $class_register->cr_class_id = $class_id;
        $class_register->cr_user_id = Auth::user()->id;
        $class_register->cr_status = 'passive';
        $class_register->cr_date_attended = date('Y-m-d H:i:s');
        $class_register->save();

        Session::flash('classDetails', $class); 
        return redirect('/registeredClass')->with('success', 'You have successfully registed for the class.');
    } 

    

}


