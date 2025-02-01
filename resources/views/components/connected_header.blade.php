<header class="text-4xl font-semibold py-6 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-44 hover:underline">
            <a href="{{ route('get.mySurveys') }}">My surveys</a>
        </div>
        <div class="flex justify-end space-x-10 items-center">
            <a id="all_surveys" href="{{ route('all.surveys') }}" class="flex flex-col size-16">
                <img src="/images/earth.png" alt="all surveys button">
                <label class="text-xs mt-1">All surveys</label>
            </a>
            <a id="logout" href="{{ route('logout') }}" class="flex size-20">
                <img src="/images/logout.png" alt="logout button">
            </a>
        </div>
    </div>
</header>
