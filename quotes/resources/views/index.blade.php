<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
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

            .quote-card {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                width: 300px;
                height: 300px;
            }

            .quote-text {
                padding: 20px 20px;
                text-align: center
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .grid-container {
                display: grid;
                grid-template-columns: 400px 400px 400px;
                grid-template-rows: 400px 400px 400px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>

        <div class="grid-container">
            @foreach ($quotes as $quote)
                <div class="quote-card">
                    @if ($loop->iteration % 5 == 0)
                        <script type="text/javascript">
                            ( function() {
                                    if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
                                    var unit = {"calltype":"async[2]","publisher":"gngcp","width":300,"height":250,"sid":"Chitika Default"};
                                    var placement_id = window.CHITIKA.units.length;
                                    window.CHITIKA.units.push(unit);
                                    document.write('<div id="chitikaAdBlock-' + placement_id + '"></div>');
                            }());
                        </script>
                        <script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
                    @else
                    <div class="quote-text">{{ $quote }}</div>
                    @endif
                </div>
            @endforeach
        </div>
    </body>
</html>
