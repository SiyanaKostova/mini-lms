<x-layout :title="$course->title">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">{{ $course->title }}</h1>
        <p class="text-gray-600 mt-2">{{ $course->description }}</p>

        @auth
            @if (auth()->id() === $course->user_id)
                <div class="flex items-center justify-between mt-6">
                    <a href="{{ route('lectures.create', $course) }}"
                       class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
                        + Add Lecture
                    </a>

                    <form method="POST" action="{{ route('courses.destroy', $course) }}"
                          onsubmit="return confirm('Are you sure you want to delete this course?');">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded transition">
                            Delete Course
                        </button>
                    </form>
                </div>
            @endif
        @endauth
    </div>

    <h2 class="text-xl font-semibold text-gray-800 mb-4 border-b pb-2">Lecture</h2>

    @if ($lectures->count())
        @foreach ($lectures as $lecture)
            <div class="bg-white p-6 rounded-xl shadow-md transform hover:scale-[1.02] hover:shadow-xl transition duration-300 ease-in-out border border-gray-200 hover:border-blue-300">
                <h3 class="text-xl font-semibold text-blue-800 mb-1 tracking-tight">
                    {{ $lecture->order }}. {{ $lecture->title }}
                </h3>
                <p class="text-sm text-gray-600 mb-4 leading-relaxed">
                    {{ $lecture->description }}
                </p>

                <div class="aspect-video overflow-hidden rounded-lg border border-gray-300 hover:border-blue-500 transition">
                    <iframe class="w-full h-full rounded" src="{{ $lecture->youtube_url }}"
                            frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        @endforeach

        <div class="mt-6">
            {{ $lectures->links() }}
        </div>
    @else
        <p class="text-gray-600">No lectures added yet.</p>
    @endif
</x-layout>