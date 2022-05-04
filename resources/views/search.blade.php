<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{ route('searcher') }}" method="POST">
        @csrf
        <input type="text" name="search" required />
        <button type="submit">Search</button>
    </form>

    <div>

        @if ($students->isNotEmpty())
            @foreach ($students as $student)
                <div class="post-list">
                    {{-- {{ dd($student) }} --}}
                    <p>{{ $student->cert_no }}</p>
                    <p>{{ $student->name }}</p>
                </div>
            @endforeach
        @else
            <div>
                <h2>No students found</h2>
            </div>

        @endif
    </div>
</body>

</html>
