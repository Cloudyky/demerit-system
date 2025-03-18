<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function index(Request $request)
    {

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

    public function show($id, $name)
    {
        $student = Student::where('id', $id)->where('name', urldecode($name))->firstOrFail();
        return view('student.personal', compact('student'));
    }

    public function remove($id)
    {
        $student = Student::findOrFail($id);
        
        DB::table('removed_students')->insert([
            'name' => $student->name,
            'ic' => $student->ic,
            'gender' => $student->gender,
            'kohort' => $student->kohort,
            'class' => $student->class,
            'merit_points' => $student->merit_points,
            'removed_by' => auth()->id(), // Assuming you have a user authentication system
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $student->delete();
        
        return redirect()->route('students')->with('success', 'Student removed successfully.');
    }

}
