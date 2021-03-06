<?php

namespace App\Http\Controllers;

use App\Mail\FoundMail;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                ->where('cert_no', $query)
                ->get();
            // dd($results);
            if ($results->count()) {
                Alert::success('Success', 'Student Record found');
        Mail::to(auth()->user()->email)->send(new FoundMail($results));

            } else {
                Alert::error('Failed', 'Student does not exist');
            }
        }
        return view('search', [
            'students' => $results,
        ]);

    }
}
