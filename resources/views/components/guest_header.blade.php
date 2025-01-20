<header class="text-4xl font-semibold py-10 px-14 bg-gray-700 text-white">
    <div class="flex items-center justify-between w-full">
        <div class="flex justify-center w-full pl-40">
            <a href="{{ route('home') }}">Survey Project</a>
        </div>
        <div class="flex justify-end space-x-8 items-center">
            <a href="{{ route('get.register') }}" class="text-center rounded-lg text-lg py-2 px-2 bg-blue-700 text-white
            hover:bg-blue-600 shadow-lg">Register</a>
            <a href="{{ route('get.login') }}"
               class="text-center rounded-lg text-lg py-2 px-2 bg-blue-700 text-white hover:bg-blue-600 shadow-lg">Login</a>
        </div>
    </div>
</header>
