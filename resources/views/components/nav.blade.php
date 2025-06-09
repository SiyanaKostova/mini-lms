<nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
    <a href="{{ route('courses.index') }}" class="text-lg font-bold text-blue-700">Mini LMS</a>
    <div class="flex items-center gap-4">
        @auth
            <span class="text-sm">Hello, {{ Auth::user()->name }}</span>
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