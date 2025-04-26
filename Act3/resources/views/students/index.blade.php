@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Students</h1>

    <form action="{{ route('students.index') }}" method="GET">
        <input type="text" name="search" value="{{ $search }}" placeholder="Search students..." />
        <button type="submit">Search</button>
    </form>

    <a href="{{ route('students.create') }}">Add Student</a>

    @foreach($students as $student)
        <div style="border: 1px solid #ccc; margin:10px; padding:10px;">
            <h2>{{ $student->name }}</h2>
            <p>Email: {{ $student->email }}</p>
            <p>Phone: {{ $student->phone }}</p>
            <a href="{{ route('students.show', $student->id) }}">View QR Code</a>
        </div>
    @endforeach

    {{ $students->links() }}
</div>
@endsection
