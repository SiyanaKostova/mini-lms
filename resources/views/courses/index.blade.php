<x-layout title="All Courses">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">All Courses</h1>
        @auth
            <a href="{{ route('courses.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded text-sm transition">
                + New Course
            </a>
        @endauth
    </div>

    @if ($courses->count())
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
                    <a href="{{ route('courses.show', $course->slug) }}" class="text-xl font-semibold text-blue-700 hover:underline">
                        {{ $course->title }}
                    </a>
                    <p class="text-sm text-gray-600 mt-2 line-clamp-3">{{ $course->description }}</p>
                    <p class="text-xs text-gray-400 mt-2">By {{ $course->user->name }}</p>
                </div>
            @endforeach
        </div>

        <div class="mt-8">
            {{ $courses->links() }}
        </div>
    @else
        <p class="text-gray-600">No courses available.</p>
    @endif
</x-layout>