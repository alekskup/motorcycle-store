<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Мотоциклы')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">
<header class="bg-white shadow p-4 mb-6">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('catalog.index') }}" class="text-xl font-bold">MotoStore</a>
        <nav>
            <a href="{{ route('catalog.index') }}" class="hover:underline">Каталог</a>
        </nav>
    </div>
</header>
<main class="container mx-auto px-4 pb-10">
    @yield('content')
</main>
</body>
</html>
