<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Task Manager') }}
        </h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Task Creation Form --}}
        <form action="/tasks" method="POST" class="mb-6 bg-white p-4 rounded shadow">
            @csrf
            <div class="flex items-center">
                <input type="text" name="title" placeholder="Enter task title..." required
                       class="w-full border-gray-300 rounded mr-4 p-2">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                    Add Task
                </button>
            </div>
        </form>

        {{-- Display Tasks by Status --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach (['To Do', 'In Progress', 'Done'] as $status)
                <div class="bg-white p-4 rounded shadow">
                    <h3 class="text-lg font-bold mb-2">{{ $status }}</h3>
                    <ul>
                        @forelse ($tasks[$status] ?? [] as $task)
                            <li class="mb-2 flex justify-between items-center">
                                <span>{{ $task->title }}</span>
                                <form action="/tasks/{{ $task->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" onchange="this.form.submit()"
                                            class="border rounded px-2 py-1 text-sm">
                                        <option {{ $task->status === 'To Do' ? 'selected' : '' }}>To Do</option>
                                        <option {{ $task->status === 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                        <option {{ $task->status === 'Done' ? 'selected' : '' }}>Done</option>
                                    </select>
                                </form>
                            </li>
                        @empty
                            <li class="text-gray-500 text-sm">No tasks.</li>
                        @endforelse
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
