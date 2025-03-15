<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(Request $request){

        $query = Student::query();

        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
    
            $query->where(function ($subQuery) use ($searchTerm) {
                $subQuery->where('ic', 'like', '%' . $searchTerm . '%')
                         ->orWhere('name', 'like', '%' . $searchTerm . '%')
                         ->orWhere('class', 'like', '%' . $searchTerm . '%');
            });
        }
    
        $students = $query->get();
        $count = $students->count();
    
        return view('student.index', compact('students', 'count'));
    }

    public function show($id, $name){
        $student = Student::where('id', $id)->where('name', urldecode($name))->firstOrFail();
        return view('student.personal', compact('student'));
    }

}
