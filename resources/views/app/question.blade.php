<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Questions</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
{{--Header.--}}
<x-connected_header></x-connected_header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">

        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <div class="mx-auto text-3xl">{{ $survey->name }}</div>

            {{--            <a class="text-blue-700 underline underline-offset-8 decoration-4" href="{{ route('get.question', [$survey])}}">Question</a>--}}
            {{--            <a class="hover:text-blue-700 ease-out duration-300" href="{{ route('get.response', [$survey]) }}">Answers</a>--}}
        </div>

        {{--    Check if $questions has many elements.--}}
        @if (isset($questions[0]))
            <div class="flex flex-col">
                @foreach($questions as $question)
                    Question: {{ $question['title'] }}
                    @foreach($answers as $answer)
                        Answer: {{$answer['answer']}}
                    @endforeach
                @endforeach
            </div>
        @else
            <div class="flex flex-row items-center py-8">
                <div class="w-1/2 flex justify-center text-lg">Question: {{ $questions['title'] }}</div>
                <form class="w-1/2 flex  items-center py-8 gap-3" method="POST" action="{{ route('post.response') }}">
                    @csrf
                    <input type="hidden" name="survey_id" value="{{ $survey->_id }}">
                    <input type="hidden" name="question_id" value="{{ $questions['_id'] }}">
                    <label class="text-lg">Add a response here:</label>
                    <input class="border rounded-md" name="answer" placeholder="Enter the response here...">
                    <button type="submit"
                            class="button-create">
                        Create response
                    </button>
                </form>
            </div>

            @if (isset($answers[0]))
                @foreach($answers as $answer)
                    {{$user->name}}: {{$answer->answer}}
                @endforeach
            @elseif ($answers)
                {{$user->name}}: {{$answers['answer']}}
            @endif


{{--            Answer: {{$answer['answer']}}--}}
            {{--    New Response form.--}}
        @endif

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
