<header class="text-4xl font-semibold py-6 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-44 hover:underline">
            <a href="{{ route('all.surveys') }}">Survey Project</a>
        </div>
        <div class="flex justify-end space-x-10 items-center">
            <a id="new_survey" href="{{ route('get.question') }}" class="flex flex-col size-20">
                <img src="/images/contact-form.png" alt="new survey button">
                <label class="text-xs">New survey</label>
            </a>
            <a id="logout" href="{{ route('logout') }}" class="flex size-20">
                <img src="/images/logout.png" alt="logout button">
            </a>
        </div>
    </div>
</header>
