<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;

class ClassesController extends Controller
{
    public function index() {
        $classData = Classes::orderBy('cl_id','desc')->paginate(10);
        return view('admin/classes')->with('classes',$classData);
    }

    public function previousClasses() {
        $classData = Classes::orderBy('cl_id','desc')->where('cl_status', 'Ended')->paginate(10);
        return view('premium/previousClass')->with('classes',$classData);
    }

    public function availableClasses() {
        $classData = Classes::orderBy('cl_id','desc')->where('cl_status', 'Enabled')->paginate(10);
        return view('premium/availableClass')->with('classes',$classData);
    }

 
}
