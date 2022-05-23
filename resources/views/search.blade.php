@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div>
                    <form action="/search" method="GET">
                        <input minlength="5" value="{{ request()->get('query') }}" type="search" name="query"
                            placeholder="Type a certificate number" style="width:100%">
                        <button>Search</button>
                    </form>
                    @if ($students)
                        <div class="space-y-4">
                            @if ($students->count())
                                @foreach ($students as $student)
                                    <div>
                                        <h1><u>CONFIRMATION OF CERTIFICATE - {{ $student->lname }}
                                                {{ $student->fname }}</u></h1>

                                        <p>This confirms that {{ $student->fname }} {{ $student->lname }}
                                            ({{ $student->regno }})
                                            is a past student of the University of Cape Coast. He
                                            was admitted in {{ substr($student->doa, -4) }} to pursue a
                                            {{ $student->program->program_type->comment }} in
                                            {{ $student->program->long_name }}.
                                        </p>
                                        <p>{{ $student->lname }} wrote and passed the final examinations in
                                            {{ substr($student->doc, -4) }} as was accordingly admitted to the degree of
                                            {{ $student->program->program_type->comment }}
                                            @if ($student->program->program_type->comment === 'BACHELOR')
                                                <span>with
                                                    @if ($student->cgpa >= 3.6)
                                                        <span>First Class Honours</span>
                                                    @elseif ($student->cgpa >= 3.0)
                                                        <span>Second Upper, Upper Divison</span>
                                                    @elseif ($student->cgpa >= 2.5)
                                                        <span>Second Lower, Lower Division</span>
                                                    @elseif ($student->cgpa >= 2.0)
                                                        <span>Third Class</span>
                                                    @else
                                                        <span> a Pass</span>
                                                    @endif
                                                </span>
                                            @else
                                                <span>----INSERT date of completion here ----</span>
                                            @endif
                                        </p>



                                    </div>
                                @endforeach
                            @else
                                <p>No student found</p>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
