
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css" />

        <!-- Styles -->
        <style>
            html , body {
                background-color: #e5e7eb;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .full-height{
                height: 100vh;
            }
            .flex-center{
                align-items: center;
                display: flex;
                justify-content: center;
            
            }
            .position-ref {
                position: relative;

            }
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;

            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;

            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: lrem;
                text-decoration: none;
                text-transform: uppercase;
                
            }
            .m-b-md {
                margin-bottom: 30px;
            }

        </style>
    </head>
    <body >
    <br>
        <div class="flex-center position-ref full-height">

        @if (Route::has('login') && Auth::check())
                <div class="top-right links">
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                </div>
            @elseif (Route::has('login') && !Auth::check())
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif
            <br>
            
            <div class="content">
                <div class="title m-b-mb">
                    App UCI
                
                </div>
                <br>
                <br>
                <div class="links">
                    <a href="https://laravel.com/docs" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">Documentation</a>
                    <a href="https://laracasts.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">Laracasts</a>
                    <a href="https://laravel-news.com" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">News</a>
                    <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">GitHub</a>

                </div>
                <BR></BR>
                <div>
            </div>
                </div>
            </div>
        </div>
    </body>
</html>


