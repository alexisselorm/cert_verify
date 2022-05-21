<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function __invoke(Request $request)
    {
        $results = null;
        $query = $request->get('query');
        if ($query) {
            $results = Students::search($query)->query(function ($builder) {
                $builder->with('program', 'program.program_run_type', 'program.program_type');
            })->get();

            // dd($results);
        }
        return view('search', [
            'students' => $results,
        ]);

    }
}
