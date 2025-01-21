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
            <a class="text-blue-700 underline underline-offset-8 decoration-4" href="/survey">Survey</a>
            <a class="hover:text-blue-700 ease-out duration-300" href="/answers">Answers</a>
        </div>

{{--    Check if the survey is not initialized with a name.--}}
        @if (empty($survey->name))
            <form class="flex flex-row justify-center items-center py-8 gap-3" method="POST"
                  action="{{ route('post.surveyName') }}">
                @csrf
                <label class="text-lg">Enter the name of your survey:</label>
                <input class="border rounded-md" name="name" placeholder="Enter the name here...">
                <button type="submit"
                        class="button-create">
                    Create the name
                </button>
            </form>
        @else
            <div class="flex flex-row justify-center gap-36">
                <form class="w-1/4 flex flex-col py-8" method="POST" action="{{ route('post.surveyQuestion') }}">
                    @csrf
                    <label>Choose a title for the question:</label>
                    <input class="border rounded-md" name="name" placeholder="Enter the title here...">
                    <button type="submit"
                            class="button-create">
                        Create the name
                    </button>
                </form>
                <form class="w-1/3 text-md flex flex-row items-start py-8 gap-2" method="POST"
                      action="{{ route('post.surveyQuestion') }}">
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
        @endIf
{{--    Display messages and errors.--}}
        <x-message></x-message>
        <x-error></x-error>
    </section>
</main>
{{--Load animations script.--}}
@vite('resources/js/animations.js')
</body>
</html>
