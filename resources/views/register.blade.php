<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<header class="flex justify-center text-3xl font-semibold py-8 bg-gray-700 text-white">
    <a href="{{ route('home') }}">Survey Project</a>
</header>
<main class="pt-16">
    <section class="mx-auto w-1/3 flex flex-col rounded-lg shadow-2xl bg-white">
        <h1 class="text-xl font-medium py-4 text-center bg-gray-300 rounded-t-lg">Register</h1>
        <form class="flex flex-col items-center py-4 gap-y-6" method="POST" action="{{ route('register') }}">
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
                <input class="border rounded-md" name="passwordConfirmation" placeholder="Confirm your password...">
            </div>
            <button type="submit"
                    class="button-authentication">
                Register
            </button>
            <div class="text-xs">
                <label>Already have an account? <a class="font-semibold underline" href="{{ route('login') }}">Login</a></label>
            </div>
        </form>
    </section>
</main>
</body>
</html>
