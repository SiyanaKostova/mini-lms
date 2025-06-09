<x-layout :title="$course->title">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">{{ $course->title }}</h1>
        <p class="text-gray-700 mt-2">{{ $course->description }}</p>

        @auth
            @if (auth()->id() === $course->user_id)
                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('lectures.create', $course) }}" class="bg-green-600 text-white px-4 py-2 rounded">
                        + Add Lecture
                    </a>

                    <form method="POST" action="{{ route('courses.destroy', $course) }}"
                          onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 text-white px-4 py-2 rounded">
                            Delete Course
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <h2 class="text-lg font-semibold mb-4">Lectures</h2>

    @if ($course->lectures->count())
        <ul class="space-y-4">
            @foreach ($course->lectures as $lecture)
                <li class="bg-white p-4 rounded shadow">
                    <h3 class="text-blue-700 font-semibold">{{ $lecture->order }}. {{ $lecture->title }}</h3>
                    <p class="text-sm text-gray-700">{{ $lecture->description }}</p>
                    <div class="mt-2 aspect-video">
                        <iframe width="100%" height="315" src="{{ $lecture->youtube_url }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-600">No lectures added yet.</p>
    @endif
</x-layout>