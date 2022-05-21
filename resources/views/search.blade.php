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
                        <input type="search" name="query" placeholder="Type a certificate number" style="width:100%">
                        <button>Search</button>
                    </form>
                    {{-- @if ($results)
                        <div class="space-y-4">
                            @if ($results->count())
                                @foreach ($results as result)

                                @endforeach
                            @else
                                <p>No student found</p>
                            @endif --}}
                        {{-- </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
