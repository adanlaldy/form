<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Surveys</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="text-4xl font-semibold py-8 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-14">
            <a href="{{ route('home') }}">Survey Project</a>
        </div>
        <div class="flex justify-end space-x-8 items-center">
            <a href="{{ route('get.login') }}" class="flex size-14">
                <img src="/images/add.png" alt="new survey button">
            </a>
            <a href="{{ route('logout') }}" class="flex size-16">
                <img src="/images/logout.png" alt="logout button">
            </a>
        </div>
    </div>
</header>


<main>

</main>
</body>
</html>
