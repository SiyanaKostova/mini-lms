<x-layout :title="$course->title">
    <div class="mb-6">
        <h1 class="text-2xl font-bold">{{ $course->title }}</h1>
        <p class="text-gray-700 mt-2">{{ $course->description }}</p>
    </div>

    <h2 class="text-lg font-semibold mb-4">Lectures</h2>

    @if ($course->lectures->count())
        <ul class="space-y-4">
            @foreach ($course->lectures as $lecture)
                <li class="bg-white p-4 rounded shadow">
                    <h3 class="text-blue-700 font-semibold">{{ $lecture->title }}</h3>
                    <p class="text-sm">{{ $lecture->description }}</p>
                    <div class="mt-2">
                        <iframe width="100%" height="315" src="{{ $lecture->youtube_url }}" frameborder="0" allowfullscreen></iframe>
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No lectures added yet.</p>
    @endif

    @auth
        <a href="{{ route('lectures.create', $course) }}" class="inline-block mt-6 bg-green-600 text-white px-4 py-2 rounded">+ Add Lecture</a>
    @endauth
</x-layout>