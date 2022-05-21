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
                        <input required value="{{ request()->get('query') }}" type="search" name="query"
                            placeholder="Type a certificate number" style="width:100%">
                        <button>Search</button>
                    </form>
                    @if ($students)
                        <div class="space-y-4">
                            @if ($students->count())
                                @foreach ($students as $student)
                                    <div>
                                        <h1>{{ $student->program->short_name }}</h1>
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
