<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="flex justify-between text-4xl font-semibold py-11 px-14 bg-gray-700 text-white">
    <div>
        <a href="{{ route('home') }}">Survey Project</a>
    </div>
    <div class="space-x-16">
        <a href="{{ route('get.register') }}" class="text-center rounded-lg text-lg py-2 px-2 bg-blue-700 text-white hover:bg-blue-600 shadow-lg">Register</a>
        <a href="{{ route('get.login') }}" class="text-center rounded-lg text-lg py-2 px-2 bg-blue-700 text-white hover:bg-blue-600 shadow-lg">Log in</a>
    </div>
</header>
<main class="pt-16">
    <section class="mx-auto w-1/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <h1 class="text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">Register</h1>
        <form class="flex flex-col items-center py-4 gap-y-6" method="POST" action="{{ route('post.register') }}">
            @csrf
            <div class="flex flex-col">
                <label>Name</label>
                <input class="border rounded-md" name="name" placeholder="Enter your name...">
            </div>
            <div class="flex flex-col">
                <label>Email</label>
                <input class="border rounded-md" name="email" placeholder="Enter your email...">
            </div>
            <div class="flex flex-col">
                <label>Password</label>
                <input class="border rounded-md" name="password" placeholder="Enter a password...">
            </div>
            <div class="flex flex-col">
                <label>Password confirmation</label>
                <input class="border rounded-md" name="password_confirmation" placeholder="Confirm your password...">
            </div>
            <button type="submit"
                    class="button-authentication">
                Register
            </button>
            <div class="text-xs">
                <label>Already have an account? <a class="font-semibold underline" href="{{ route('get.login') }}">Login</a></label>
            </div>
        </form>
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
