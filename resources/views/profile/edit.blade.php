@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Todo</h1>

    <form action="{{ route('todos.update', $todo->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $todo->title }}" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>
</div>
@endsection
