@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Todo</h1>

    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Create</button>
    </form>
</div>
@endsection
