<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 10 Task List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    <style type="text/tailwindcss">
        body { @apply bg-slate-100 text-slate-800; }
        .container { @apply container mx-auto mt-10 mb-10 max-w-lg px-4; }
        .card { @apply bg-white shadow-md rounded-lg p-6; }
        .btn { @apply inline-block rounded-md px-4 py-2 text-sm font-medium text-slate-700 shadow-sm ring-1 ring-slate-300 bg-white hover:bg-slate-50 transition-colors cursor-pointer; }
        .btn-primary { @apply bg-slate-800 text-white hover:bg-slate-700 ring-0; }
        .btn-danger { @apply text-red-600 ring-red-200 hover:bg-red-50; }
        .link { @apply font-medium text-slate-600 underline decoration-slate-400 hover:text-slate-900 hover:decoration-slate-900 transition-all; }
        label { @apply block text-sm font-bold text-slate-600 mb-1 uppercase tracking-wide; }
        input, textarea { @apply shadow-sm appearance-none border border-slate-300 rounded w-full py-2 px-3 text-slate-700 leading-tight focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent transition-all; }
        .error-msg { @apply text-red-500 text-xs mt-1; }
    </style>

    @yield('styles')
</head>

<body>
<div class="container">
    <header class="mb-8 flex justify-between items-center">
        <h1 class="text-3xl font-bold text-slate-700 text-center w-full">@yield('title')</h1>

        <a href="{{ route('tasks.index') }}" class="text-slate-400 hover:text-slate-600">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
        </a>
    </header>

    <div x-data="{ flash: true }">
        @if(session()->has('success'))
        <div x-show="flash" class="relative mb-6 rounded-lg border-l-4 border-green-300 bg-green-100 p-4 shadow-md" role="alert">
            <div class="flex justify-between items-center">
                <div>
                    <strong class="block font-bold text-green-700">Success!</strong>
                    <span class="text-sm text-slate-600">{{ session('success') }}</span>
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" @click="flash = false" stroke="currentColor" class="h-5 w-5 text-slate-400 cursor-pointer hover:text-slate-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        </div>
        @endif

        @yield('content')
    </div>
</div>
</body>
</html>
