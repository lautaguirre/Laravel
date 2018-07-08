<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('css/article/view.css') }}">
    </head>
    <body>
        <div class="articleContainer">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    {{ $article->title }}
                </div>

                <div class="user m-b-md">
                    {{ $article->user->name }}
                </div>

                <div class="links m-b-md">
                    @foreach($article->tags as $tag)
                        <a href="#">{{ $tag->name }}</a>
                    @endforeach
                </div>

                <div class="articleContent">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </body>
</html>
