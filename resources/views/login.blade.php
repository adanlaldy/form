<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
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
<main class="pt-16">
    <section class="mx-auto w-1/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <h1 class="text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">Login</h1>
        <form class="flex flex-col items-center py-8 gap-y-6" method="POST" action="{{ route('post.login') }}">
            @csrf
            <div class="flex flex-col">
                <label>Email</label>
                <input type="email" class="border rounded-md" name="email" placeholder="Enter your email...">
            </div>
            <div class="flex flex-col">
                <label>Password</label>
                <input type="password" class="border rounded-md" name="password" placeholder="Enter a password...">
            </div>
            <button type="submit"
                    class="button-authentication">
                Login
            </button>
            <div class="text-xs">
                <label>Don't have an account? <a class="font-semibold underline"
                                                 href="{{ route('get.register') }}">Register</a></label>
            </div>
        </form>
        @if (session('message'))

            <div class="py-2 text-center bg-green-500 text-white">
                {{ session('message') }}
            </div>

        @endif
        @if ($errors->any())
            <div class="py-2 text-center bg-red-500 text-white">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </section>
</main>
</body>
</html>
