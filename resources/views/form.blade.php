@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Add New Task')

@section('content')
<div class="card">
    <form method="POST" action="{{ isset($task) ? route('task.update', ['task' => $task->id]) : route('task.store') }}">
        @csrf
        @isset($task) @method('PUT') @endisset

        <div class="mb-6">
            <label for="title">Task Title</label>
            <input type="text" name="title" id="title"
                   class="@error('title') border-red-500 bg-red-50 @enderror"
                   value="{{ $task->title ?? old('title') }}"
                   placeholder="e.g., Learn Laravel Routing" />
            @error('title')
            <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description">Short Description</label>
            <textarea name="description" id="description" rows="3"
                      class="@error('description') border-red-500 bg-red-50 @enderror">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
            <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="long_description">Detailed Description</label>
            <textarea name="long_description" id="long_description" rows="6"
                      class="@error('long_description') border-red-500 bg-red-50 @enderror">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
            <p class="error-msg">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-3 items-center pt-4 border-t border-slate-100">
            <button type="submit" class="btn btn-primary">
                @isset($task) Update Task @else Create Task @endisset
            </button>

            <a href="{{ route('tasks.index') }}" class="link text-sm ml-auto">Cancel</a>
        </div>
    </form>
</div>
@endsection
