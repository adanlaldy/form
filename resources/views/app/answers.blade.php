<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Answers</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<x-connected_header></x-connected_header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="hover:text-blue-700 ease-out duration-300" href="/survey">Survey</a>
            <a class="text-blue-700" href="/answers">Answers</a>
        </div>
    </section>
</main>
</body>
</html>
