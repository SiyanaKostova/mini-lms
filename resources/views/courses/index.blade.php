<x-layout title="All Courses">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">All Courses</h1>
        @auth
            <a href="{{ route('courses.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded text-sm">+ New Course</a>
        @endauth
    </div>

    @if ($courses->count())
        <ul class="space-y-4">
            @foreach ($courses as $course)
                <li class="bg-white p-4 rounded shadow">
                    <a href="{{ route('courses.show', $course->slug) }}" class="text-xl font-semibold text-blue-700 hover:underline">
                        {{ $course->title }}
                    </a>
                    <p class="text-sm text-gray-600">{{ $course->description }}</p>
                    <p class="text-xs text-gray-400">By {{ $course->user->name }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No courses available.</p>
    @endif
</x-layout>