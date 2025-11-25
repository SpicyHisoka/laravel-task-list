@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')
<div class="mb-6 flex justify-end">
    <a href="{{ route('tasks.create') }}" class="btn btn-primary shadow-lg">+ Add Task</a>
</div>

<div class="space-y-3">
    @forelse($tasks as $task)
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
           class="block bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition-shadow border-l-4 {{ $task->completed ? 'border-green-300 opacity-75' : 'border-yellow-200' }}">
            <div class="flex justify-between items-center">
                <span class="font-semibold text-lg {{ $task->completed ? 'line-through text-slate-400' : 'text-slate-700' }}">
                    {{ $task->title }}
                </span>

                @if($task->completed)
                    <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded-full font-bold">Completed</span>
                @else
                    <span class="text-xs bg-yellow-100 text-slate-600 px-2 py-1 rounded-full font-bold">Pending</span>
                @endif
            </div>
        </a>
    @empty
        <div class="text-center py-10">
            <p class="text-slate-500 text-lg">No tasks yet!</p>
            <p class="text-slate-400 text-sm">Get started by adding one above.</p>
        </div>
    @endforelse
</div>

@if ($tasks->count())
    <nav class="mt-8">{{ $tasks->links() }}</nav>
@endif
@endsection
