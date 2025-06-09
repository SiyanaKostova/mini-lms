<x-layout title="Create Course">
    <h1 class="text-2xl font-bold mb-6">Create New Course</h1>

    <form method="POST" action="{{ route('courses.store') }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Title</label>
            <input name="title" value="{{ old('title') }}" required class="w-full mt-1 border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" rows="4" class="w-full mt-1 border px-3 py-2 rounded">{{ old('description') }}</textarea>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Create</button>
    </form>
</x-layout>