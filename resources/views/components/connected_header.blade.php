<header class="text-4xl font-semibold py-8 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-32">
            <a href="{{ route('all.surveys') }}">Survey Project</a>
        </div>
        <div class="flex justify-end space-x-8 items-center">
            <a id="new_survey" href="{{ route('get.survey') }}" class="flex size-14">
                <img src="/images/contact-form.png" alt="new survey button">
            </a>
            <a id="logout" href="{{ route('logout') }}" class="flex size-16">
                <img src="/images/logout.png" alt="logout button">
            </a>
        </div>
    </div>
</header>
