<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Mini LMS' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <x-nav />

    <main class="max-w-4xl mx-auto mt-10 p-6">
        {{ $slot }}
    </main>
</body>
</html>