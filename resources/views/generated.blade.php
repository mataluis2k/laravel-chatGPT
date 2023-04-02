@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Generated Text</h1>
        <p>{{ $generatedText }}</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Try Again</a>
    </div>
@endsection