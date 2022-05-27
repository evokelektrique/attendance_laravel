<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield("title")</title>
    <link rel="stylesheet" type="text/css" href="{{ asset("css/app.css") }}">
    <script type="text/javascript" src="{{ asset("js/app.js") }}" defer=""></script>
</head>
<body dir="rtl" class="">
    <div class="container">
        @include("navbar")
        <div class="mt-6">
            @yield("content")
        </div>
    </div>
</body>
</html>
