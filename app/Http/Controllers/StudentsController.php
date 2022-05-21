<?php

namespace App\Http\Controllers;

use App\Models\Students;

class StudentsController extends Controller
{
    //
    public function show(Students $students)
    {
        $student_id = $students->id;
        $student = Students::with('program', 'program.program_run_type', 'program.program_type')->findOrFail($student_id);

        return response()->json($student, 200);
    }

}
