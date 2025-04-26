@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $student->name }}</h1>

    <p>Email: {{ $student->email }}</p>
    <p>Phone: {{ $student->phone }}</p>
    <p>Age: {{ $student->age }}</p>
    <p>Address: {{ $student->address }}</p>

    <h2>QR Code:</h2>
    {!! QrCode::size(250)->generate(
        "Name: {$student->name}\nEmail: {$student->email}\nPhone: {$student->phone}\nAge: {$student->age}\nAddress: {$student->address}"
    ) !!}
</div>
<a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">Back</a>
<form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
    </form>
@endsection
