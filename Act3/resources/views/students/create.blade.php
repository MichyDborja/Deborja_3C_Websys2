@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Student</h1>

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="Phone" required><br>
        <input type="number" name="age" placeholder="Age" required><br>
        <textarea name="address" placeholder="Address" required></textarea><br>
        <button type="submit">Create</button>
    </form>
</div>
@endsection
