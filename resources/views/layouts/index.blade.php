<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
</head>
<body>
    <div class="container">
        <p>You're a guest. <a href="{{ route('login') }}">Log in</a></p>
        @yield("content")
    </div>
</body>
</html>
