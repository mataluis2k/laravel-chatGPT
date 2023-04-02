@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Generate Text with GPT-4 and Laravel</h1>
        <form action="{{ route('generate') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="prompt">Enter a prompt:</label>
                <input type="text" class="form-control" id="prompt" name="prompt" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate</button>
        </form>
    </div>
@endsection