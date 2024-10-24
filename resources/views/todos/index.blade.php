@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Todo List</h1>
    <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Create New Todo</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul class="list-group">
        @foreach($todos as $todo)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $todo->title }}
                <div>
                    <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>

                    @if(!$todo->completed)
                        <button class="btn btn-success btn-sm complete-todo" data-id="{{ $todo->id }}">Mark Complete</button>
                    @else
                        <span class="badge bg-success">Completed</span>
                    @endif
                </div>
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.querySelectorAll('.complete-todo').forEach(button => {
        button.addEventListener('click', function () {
            const todoId = this.getAttribute('data-id');
            
            fetch(`/todos/${todoId}/complete`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        });
    });
</script>
@endsection
