<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SearchController extends Controller
{
    //
    public function __invoke(Request $request)
    {

        $results = null;
        $query = $request->get('query');
        if ($query) {
            $results = Students::search($query)
                ->query(function ($builder) {
                    $builder
                        ->with('program', 'program.program_run_type', 'program.program_type');
                })
                ->get();
            dd($results);
            if ($results->count()) {
                Alert::success('Success', 'Student Record found');
            } else {
                Alert::error('Failed', 'Student does not exist');
            }
        }

        return view('search', [
            'students' => $results,
        ]);

    }
}
