<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Surveys</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
<x-connected_header></x-connected_header>
<main>
    <div>
        {{ $user->token }}
    </div>
</main>
</body>
</html>
