<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="flex justify-center text-3xl font-semibold py-8 bg-gray-700 text-white">
    <a href="{{ route('home') }}">Survey Project</a>
</header>
<main class="pt-16">
    <section class="mx-auto w-1/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <h1 class="text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">Login</h1>
        <form class="flex flex-col items-center py-8 gap-y-6" method="POST" action="{{ route('post.login') }}">
            @csrf
            <div class="flex flex-col">
                <label>Email</label>
                <input class="border rounded-md" name="email" placeholder="Enter your email...">
            </div>
            <div class="flex flex-col">
                <label>Password</label>
                <input class="border rounded-md" name="password" placeholder="Enter a password...">
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

            <label class="py-2 text-center bg-green-500 text-white">
                {{ session('message') }}
            </label>

        @endif
    </section>
</main>
</body>
</html>
