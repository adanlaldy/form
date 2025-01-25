<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Survey</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
{{--Header.--}}
<x-connected_header></x-connected_header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="text-blue-700 underline underline-offset-8 decoration-4" href="{{ route('get.question') }}">Survey</a>
            <a class="hover:text-blue-700 ease-out duration-300" href="/answers">Answers</a>
        </div>

{{--    Check if the survey is not initialized with a name.--}}
{{--        @if (empty($survey->name))--}}
{{--            <form class="flex flex-row justify-center items-center py-8 gap-3" method="POST"--}}
{{--                  action="{{ route('post.surveyName') }}">--}}
{{--                @csrf--}}
{{--                <label class="text-lg">Enter the name of your survey:</label>--}}
{{--                <input class="border rounded-md" name="name" placeholder="Enter the name here...">--}}
{{--                <button type="submit"--}}
{{--                        class="button-create">--}}
{{--                    Create the name--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        @else--}}
        <div class="flex flex-row justify-center gap-36">

{{--        Form for open choice option.--}}
            <form id="open_form" class="w-1/4 flex flex-col py-8" method="POST" action="{{ route('post.openQuestion') }}">
                @csrf
                <label>Choose a title for the question:</label>
                <input class="border rounded-md mb-6 w-full" name="title" placeholder="Enter the title here...">
                <button type="submit"
                        class="button-create w-full">
                    Create the survey
                </button>
            </form>

{{--        Form for multiple choice option.--}}
            <form id="multiple_form" class="w-1/4 flex flex-col py-8 " method="POST" action="{{ route('post.multipleQuestion') }}">
                @csrf
                <label>Choose a title for the question:</label>
                <input class="border rounded-md mb-6 w-full" name="title" placeholder="Enter the title here...">

                <label>Create answers:</label>
                <div id="add_answer" class="flex gap-2">
                    <input id="new_answer" class="border rounded-md mb-6 w-full" value="Answer n°1" placeholder="Answer...">
                    <button id="btn_new_answer" class="size-6">
                        <img src="/images/plus.png" alt="new answer button">
                    </button>
                </div>

                <div class="hidden rounded-lg border-dashed border-2 border-sky-500 bg-blue-100 mb-6" id="added_answer"></div>

                <button type="submit"
                        class="button-create w-full">
                    Create the survey
                </button>
            </form>

{{--        Form for unique choice option.--}}
            <form id="unique_form" class="w-1/4 flex flex-col py-8" method="POST" action="{{ route('post.multipleQuestion') }}">
                @csrf
                <label>Choose a title for the question:</label>
                <input class="border rounded-md mb-6 w-full" name="name" placeholder="Enter the title here...">
                <label>Create answers:</label>
                <input class="border rounded-md mb-6 w-full" name="name" value="Option n°1">
                <button type="submit"
                        class="button-create w-full">
                    TEST
                </button>
            </form>

{{--            Radio form for radio inputs.--}}
            <form class="w-1/3 text-md flex flex-row items-start py-8 gap-2" method="POST">
                @csrf

                <div class="flex flex-col gap-y-2">
                    <label for="open_answers"
                           class="accent-blue-500 has-[:checked]:border-double has-[:checked]:border-2 has-[:checked]:rounded-md has-[:checked]:border-blue-700">
                        <input type="radio" id="open_answers" name="type" value="open_answers" checked/>
                        Open answers
                    </label>
                    <label id="text_open" class="font-medium text-sm">This option allow to <span class="underline">respond one</span> answer freely.</label>
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="multiple_choices"
                           class="accent-blue-500 has-[:checked]:border-double has-[:checked]:border-2 has-[:checked]:rounded-md has-[:checked]:border-blue-700">
                        <input type="radio" id="multiple_choices" name="type" value="multiple_choices"/>
                        Multiple choices
                    </label>
                    <label id="text_multiple" class="font-medium text-sm">This option allow to choose <span class="underline">multiple answers</span> between many proposed.</label>
                </div>

                <div class="flex flex-col gap-y-2">
                    <label for="unique_choice"
                           class="accent-blue-500 has-[:checked]:border-double has-[:checked]:border-2 has-[:checked]:rounded-md has-[:checked]:border-blue-700">
                        <input type="radio" id="unique_choice" name="type" value="unique_choice"/>
                        Unique choice
                    </label>
                    <label id="text_unique" class="font-medium text-sm">This option allows to choose <span class="underline">one answer</span> between many proposed.</label>
                </div>

            </form>
        </div>
{{--        @endIf--}}
{{--    Display messages and errors.--}}
        <x-message></x-message>
        <x-error></x-error>
    </section>
</main>
{{--Load scripts.--}}
@vite('resources/js/display_question_forms.js')
@vite('resources/js/add_answer.js')
@vite('resources/js/animations.js')
</body>
</html>
