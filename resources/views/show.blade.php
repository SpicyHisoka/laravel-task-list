@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

<div class="mb-6">
    <a href="{{ route('tasks.index') }}" class="link text-sm flex items-center gap-1">
        &larr; Back to list
    </a>
</div>

<div class="card">

    <div class="flex justify-between items-start mb-4">
        <h2 class="text-2xl font-bold text-slate-800">{{ $task->title }}</h2>
        <div class="shrink-0">
            @if ($task->completed)
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Completed</span>
            @else
                <span class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">Pending</span>
            @endif
        </div>
    </div>

    <div class="text-xs text-slate-400 mb-6 flex gap-4 border-b border-slate-100 pb-4">
        <span>Created {{ $task->created_at->diffForHumans() }}</span>
        <span>•</span>
        <span>Updated {{ $task->updated_at->diffForHumans() }}</span>
    </div>

    <div class="prose prose-slate max-w-none mb-8">
        <p class="text-lg text-slate-700 mb-4 font-medium">{{ $task->description }}</p>

        @if ($task->long_description)
            <p class="text-slate-600 leading-relaxed">{{ $task->long_description }}</p>
        @endif
    </div>

    <div class="flex flex-wrap gap-2 pt-4 border-t border-slate-100">

        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn {{ $task->completed ? 'text-slate-500' : 'btn-primary' }}">
                {{ $task->completed ? 'Mark as Not Completed' : 'Mark as Completed' }}
            </button>
        </form>

        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">Edit</a>

        <form action="{{ route('task.destroy', ['task' => $task]) }}" method="POST" class="ml-auto">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                Delete
            </button>
        </form>
    </div>
</div>
@endsection
