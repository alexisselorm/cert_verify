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
                        <input required minlength="5" value="{{ request()->get('query') }}" type="search" name="query"
                            placeholder="Type a certificate number" style="width:100%">
                        <button>Search</button>
                    </form>
                    @if ($students)
                        <div class="space-y-4">
                            @if ($students->count())
                                @foreach ($students as $student)
                                    <div>
                                        <h1>{{ $student->program->short_name }}</h1>
                                        <h1>{{ $student->cgpa }}</h1>
                                        @if ($student->cgpa >= 3.6)
                                            <h1>First Class</h1>
                                        @elseif ($student->cgpa >= 3.0)
                                            <h1>Upper</h1>
                                        @elseif ($student->cgpa >= 2.5)
                                            <h1>Lower</h1>
                                        @elseif ($student->cgpa >= 2.0)
                                            <h1>Third Class</h1>
                                        @else
                                            <h1>Pass</h1>
                                        @endif

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
