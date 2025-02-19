<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Question</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
{{--Header.--}}
<x-connected_header></x-connected_header>
<main class="pt-6">
    <section class="mx-auto w-2/3 flex flex-col rounded-lg shadow-2xl bg-white">

        <div class="flex flex-row justify-evenly text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">
            <a class="text-blue-700 underline underline-offset-8 decoration-4 text-2xl" href="{{ route('get.mySurveys') }}">Survey</a>
        </div>

        <div class="flex flex-row justify-center gap-36">
{{--        Form for open choice option.--}}
            <form id="open_form" class="w-1/4 flex flex-col py-8" method="POST" action="{{ route('post.openQuestion') }}">
                @csrf
                <h2 class="mb-6">Name: <span class="underline">{{ $survey->name }}</span></h2>
                <label>Choose a title for the question:</label>
                <input class="border rounded-md mb-6 w-full" name="title" placeholder="Enter the title here...">
                <div class="hidden" id="add_open_title"></div>
                <button type="submit"
                        class="button-create w-full">
                    Create the survey
                </button>
            </form>

            <button id="add_open_title_button" class="mt-4 p-2 bg-blue-500 text-white rounded-md">+</button>

{{--        Form for multiple choice option.--}}
            <form id="multiple_form" class="w-1/4 flex flex-col py-8 " method="POST" action="{{ route('post.multipleQuestion') }}">
                @csrf
                <h2 class="mb-6">Name: <span class="underline">{{ $survey->name }}</span></h2>
                <label>Choose a title for the question:</label>
                <input class="border rounded-md mb-6 w-full" name="multiple_title" placeholder="Enter the title here...">
                <div class="hidden" id="add_multiple_title"></div>

                <label>Create answers:</label>
                <div class="flex gap-2">
                    <input id="multiple_new_answer" class="border rounded-md mb-6 w-full" value="Answer n°1" placeholder="Answer...">
                    <button id="multiple_btn_new_answer" class="size-6">
                        <img src="/images/plus.png" alt="new answer button">
                    </button>
                </div>

                <div class="hidden rounded-lg border-dashed border-2 border-sky-500 mb-2 bg-blue-100" id="multiple_added_answer"></div>

                <p class="text-sm italic mb-6">(Check✅ for setting good answers)</p>
                <button type="submit"
                        class="button-create w-full">
                    Create the survey
                </button>
            </form>
            <button id="add_multiple_title_button" class="mt-4 p-2 bg-blue-500 text-white rounded-md">+</button>

{{--        Form for unique choice option.--}}
            <form id="unique_form" class="w-1/4 flex flex-col py-8" method="POST" action="{{ route('post.uniqueQuestion') }}">
                @csrf
                <h2 class="mb-6">Name: <span class="underline">{{ $survey->name }}</span></h2>
                <label>Choose a title for the question:</label>
                <input class="border rounded-md mb-6 w-full" name="unique_title" placeholder="Enter the title here...">
                <div class="hidden" id="add_unique_title"></div>

                <label>Create answers:</label>
                <div class="flex gap-2">
                    <input id="unique_new_answer" class="border rounded-md mb-6 w-full" value="Answer n°1" placeholder="Answer...">
                    <button id="unique_btn_new_answer" class="size-6">
                        <img src="/images/plus.png" alt="new answer button">
                    </button>
                </div>

                <div class="hidden rounded-lg border-dashed border-2 border-sky-500 mb-2 bg-blue-100" id="unique_added_answer"></div>

                <p class="text-sm italic mb-6">(Select🟢 for setting the unique good answer)</p>
                <button type="submit"
                        class="button-create w-full">
                    Create the survey
                </button>
            </form>
            <button id="add_unique_title_button" class="mt-4 p-2 bg-blue-500 text-white rounded-md">+</button>

{{--        Radio form for radio inputs.--}}
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

{{--    Display messages and errors.--}}
        <x-message></x-message>
        <x-error></x-error>
    </section>
    {{--New Survey button--}}
    <x-new_survey_button></x-new_survey_button>
</main>

{{--Load scripts.--}}
@vite('resources/js/display_question_forms.js')
@vite('resources/js/add_title.js')
@vite('resources/js/animations.js')
</body>
</html>
