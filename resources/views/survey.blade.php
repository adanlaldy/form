<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="text-4xl font-semibold py-8 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-32">
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
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="text-blue-700" href="/survey">Survey</a>
            <a class="hover:text-blue-700 ease-out duration-300" href="/answers">Answers</a>
        </div>
        <form class="flex flex-row justify-center items-center py-8 gap-3">
            <label class="text-lg">Enter the name of your survey:</label>
            <input class="border rounded-md" name="name" placeholder="Enter the name here...">
            <button type="submit"
                    class="button-create">
                Create the name
            </button>
        </form>
    </section>
</main>
</body>
</html>
