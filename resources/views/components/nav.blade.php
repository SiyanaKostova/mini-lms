<nav class="bg-white shadow px-6 py-4 flex items-center justify-between">
    <a href="{{ route('courses.index') }}" class="text-lg font-bold text-blue-700">Mini LMS</a>

    {{-- Search bar --}}
    <form action="{{ route('search') }}" method="GET" class="w-full max-w-md mx-6">
        <div class="relative">
            <input type="text" name="q" value="{{ request('q') }}"
                   placeholder="Search courses or lectures..."
                   class="w-full pl-10 pr-4 py-2 border rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <svg class="w-4 h-4 absolute left-3 top-2.5 text-gray-400" fill="none" stroke="currentColor"
                 stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M21 21l-4.35-4.35M11 18a7 7 0 100-14 7 7 0 000 14z" />
            </svg>
        </div>
    </form>

    {{-- Auth Links --}}
    <div class="flex items-center gap-4">
        @auth
            <span class="text-sm text-gray-600">Hello, {{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-red-500 hover:underline text-sm">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="text-sm text-blue-500 hover:underline">Login</a>
            <a href="{{ route('register') }}" class="text-sm text-blue-500 hover:underline">Register</a>
        @endauth
    </div>
</nav>