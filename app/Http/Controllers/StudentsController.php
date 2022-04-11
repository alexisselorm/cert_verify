<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentsController extends Controller
{
    //
    public function show(Students $students)
    {
        // try {
            $someResponse = response()->json([
                'students' => $students,
            ],200);
            if (isset($someResponse)) {
                return $someResponse;
            } else {
                return response()->json([
                    "data" => "Who are you",
                ],404);
            }

        // } catch (\Exception$e) {
        //     throw new ModelNotFoundException;
        // }

    }
}
