@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Student Detail</h1>
    @if(isset($message))
        <p>{{ $message }}</p>
    @else
        <h3>Student Name: {{ $student->name }}</h3>
        <p>Email: {{ $student->email }}</p>
        <p>Role: {{ $student->role }}</p>
        
       
    @endif
</div>
@endsection
