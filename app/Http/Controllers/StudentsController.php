<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //
    public function show($id)
    {
        $student = Students::with('program', 'program.program_run_type', 'program.program_type')->findOrFail($id);
        return response()->json($student, 200);
    }
    public function searcher(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $students = Students::query()
            ->where('cert_no', 'LIKE', "%{$search}%")
        // ->orWhere('body', 'LIKE', "%{$search}%")
        // ->with('program')
            ->get();

        // Return the search view with the resluts compacted
        return view('search', compact('students'));
    }
    public function search(Request $request)
    {

        return view('search');
    }

}
