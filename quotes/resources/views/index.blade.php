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

            .persist-top {
                position: fixed;
                align-items: center;
                text-align: center;
                background-color: white;
                width: 100%;
                padding: 30px;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            }

            .title {
                font-size: 50px;
            }

			.ad-box {
				width: 100%;
				height: 100%;
				display: flex;
				flex-direction: column;
				justify-content: center;
				text-align: center;
			}

            .quote-card {
                display: grid;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                padding: 40px;
                grid-gap: 1em;
                text-align: center;
            }

            .quote-text {
                text-align: center
            }
            .quote-author {
                font-style: italic;
            }
            .quote-source {
                text-align: left;
            }
            .quote-source a {
                text-decoration: none;
            }

            .search-box {
                display: inline;
            }

            .search-box input {
                width: 200px;
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
                grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
                grid-auto-rows: minmax(300px, auto);
                grid-gap: 2em;
                grid-column-start:2;
            }
            .page {
                display:grid;
                grid-template-columns: 10% 80% 10%;
            }
            .title {
                grid-column-start:2;
            }
        </style>
    </head>
    <body>
        <div class="page">
        <div class="flex-center position-ref full-height title">
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
                "{{ $QOTD->Quote }}"
                </div>
            </div>
        </div>

        <div class="links persist-top">
            <a href="#">Flash Quotes</a>
            <form class="search-box">
                <input type="text" name="search">
            </form>
        </div>

        <div class="grid-container">
            @foreach ($quotes as $quote)
                <div class="quote-card">
                    @if ($loop->iteration % 7 == 0)
						<div class="ad-box">
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
						</div>
                    @else
                        <div class="quote-text">{{ $quote->Quote }}</div>
                        <div class="quote-author"> - {{ $quote->Author }}</div>
                        <div class="quote-source"><a href="{{ $quote->Source_Link }}">{{ $quote->Context }}</a></div>
                    @endif
                </div>
            @endforeach
        </div>
        </div>
    </body>
</html>
