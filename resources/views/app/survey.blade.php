<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<x-connected_header></x-connected_header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="text-blue-700" href="/survey">Survey</a>
            <a class="hover:text-blue-700 ease-out duration-300" href="/answers">Answers</a>
        </div>
        @if (empty($survey->name))
            <form class="flex flex-row justify-center items-center py-8 gap-3" method="POST" action="{{ route('post.surveyName') }}">
                @csrf
                <label class="text-lg">Enter the name of your survey:</label>
                <input class="border rounded-md" name="name" placeholder="Enter the name here...">
                <button type="submit"
                        class="button-create">
                    Create the name
                </button>
            </form>
        @else
            Bonjour
        @endIf
        <x-message></x-message>
        <x-error></x-error>
    </section>
</main>
</body>
</html>
