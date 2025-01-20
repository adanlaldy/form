<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<x-guest_header></x-guest_header>
<main class="pt-16">
    <section class="mx-auto w-1/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <h1 class="text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">Register</h1>
        <form class="flex flex-col items-center py-4 gap-y-6" method="POST" action="{{ route('post.register') }}">
            @csrf
            <div class="flex flex-col">
                <label>Name</label>
                <input type="text" class="border rounded-md" name="name" placeholder="Enter your name...">
            </div>
            <div class="flex flex-col">
                <label>Email</label>
                <input type="email" class="border rounded-md" name="email" placeholder="Enter your email...">
            </div>
            <div class="flex flex-col">
                <label>Password</label>
                <input type="password" class="border rounded-md" name="password" placeholder="Enter a password...">
            </div>
            <div class="flex flex-col">
                <label>Password confirmation</label>
                <input type="password" class="border rounded-md" name="password_confirmation" placeholder="Confirm your password...">
            </div>
            <button type="submit"
                    class="button-authentication">
                Register
            </button>
            <div class="text-xs">
                <label>Already have an account? <a class="font-semibold underline" href="{{ route('get.login') }}">Login</a></label>
            </div>
        </form>
        <x-error></x-error>
    </section>
</main>
</body>
</html>
