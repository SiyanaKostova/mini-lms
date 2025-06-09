<x-layout :title="'Add Lecture to ' . $course->title">
    <h1 class="text-xl font-bold mb-4">Add Lecture to {{ $course->title }}</h1>

    <form method="POST" action="{{ route('lectures.store', $course) }}" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Title</label>
            <input name="title" value="{{ old('title') }}" required class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block text-sm font-medium">Order</label>
            <input name="order" type="number" value="{{ old('order') ?? 0 }}" required class="w-full border px-3 py-2 rounded" />
        </div>

        <div>
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" rows="3" class="w-full border px-3 py-2 rounded">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">YouTube URL</label>
            <input name="youtube_url" value="{{ old('youtube_url') }}" required class="w-full border px-3 py-2 rounded" />
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">Add Lecture</button>
    </form>
</x-layout>