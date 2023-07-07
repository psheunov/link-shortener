<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body id="app" class="antialiased">
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
    <shortener
        create-action="{{route('add-link')}}"
        latest-action="{{route('latest-links')}}"
    ></shortener>
</div>
</body>
</html>

