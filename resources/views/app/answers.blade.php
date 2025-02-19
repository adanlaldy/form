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
            <a class="hover:text-blue-700 ease-out duration-300" href="{{ route('get.question', [$survey])}}">Question</a>
            <a class="text-blue-700 underline underline-offset-8 decoration-4" href="{{ route('get.response', [$survey]) }}">Answers</a>
        </div>

        @foreach($answers as $answer)--}}
            answer: {{ $answer['title'] }}
{{--            ui: {{ $answer}}--}}
        @endforeach
        {{--    Check if $questions has many elements.--}}
{{--        @if (isset($questions[0]))--}}
{{--            <div class="flex flex-col">--}}
{{--                <div class="mx-auto text-3xl py-8">{{ $survey->name }}</div>--}}
{{--                @foreach($questions as $question)--}}
{{--                    Question: {{ $question['title'] }}--}}
{{--                    @foreach($question['answers'] as $answer)--}}
{{--                        Answer: {{$answer}}--}}
{{--                    @endforeach--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="flex flex-col">--}}
{{--                <div class="mx-auto text-3xl py-8">{{ $survey->name }}</div>--}}
{{--                <div class="w-1/2 flex justify-center text-lg">Question: {{ $questions['title'] }}</div>--}}
{{--            </div>--}}
{{--        @endif--}}

        {{--    Display messages and errors.--}}
        <x-message></x-message>
        <x-error></x-error>
    </section>
    {{--New Survey button--}}
    <x-new_survey_button></x-new_survey_button>
</main>
</body>
</html>
