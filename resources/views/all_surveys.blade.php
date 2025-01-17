<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Surveys</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="flex justify-between items-center text-4xl font-semibold py-8 px-14 bg-gray-700 text-white">
    <div>
        <a href="{{ route('home') }}">Survey Project</a>
    </div>
    <div class="space-x-16 flex">
        <a href="{{ route('get.login') }}" class="flex size-14">
            <img src="/images/add.png" alt="new survey button">
        </a>
        <a href="{{ route('logout') }}" class="flex size-16">
            <img src="/images/logout.png" alt="logout button">
        </a>
    </div>
</header>
<main>

</main>
</body>
</html>
