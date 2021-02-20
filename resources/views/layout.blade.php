<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }} ">
    <title>@yield('title', 'Page')</title>
</head>
<body>
    <div class="top">
        <div class="header container">
            <a href="/" class="anchor">Главная</a>
            <a href="/news" class="anchor">Новости</a>
            <a href="/about" class="anchor">О нас</a>
        </div>
        <div class="content container">
            @yield('content')
        </div>
    </div>

</body>
</html>
