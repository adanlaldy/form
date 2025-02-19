<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Surveys</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
{{--Header.--}}
<x-connected_header></x-connected_header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">

        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="text-blue-700 underline underline-offset-8 decoration-4 text-2xl"
               href="{{ route('get.mySurveys') }}">Surveys</a>
        </div>

        @foreach ($surveys as $survey)
            <a href="{{ route('get.question', ['survey' => $survey]) }}" class="hover:border-2 text-xl py-2">
                <p>Name of the Survey: {{ $survey->name }}</p>
            </a>
        @endforeach

        {{--    Display messages and errors.--}}
        <x-message></x-message>
        <x-error></x-error>
    </section>
    {{--New Survey button--}}
    <x-new_survey_button></x-new_survey_button>
</main>

{{--Load scripts.--}}
{{--@vite('resources/js/display_question_forms.js')--}}
@vite('resources/js/animations.js')
</body>
</html>
