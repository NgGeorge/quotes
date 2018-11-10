<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Flash Quotes</title>

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
            }

            .box-shadow {
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
				transition: box-shadow 0.2s ease-in;
            }

			.no-box-shadow {
				transition: box-shadow 0.2s ease-out;
			}

            .no-left-padding {
                padding-left: 0;
            }

            .title {
                font-size: 50px;
            }

			.ad-box {
                display: grid;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
                padding-left: 00px;
                padding-top: 25px;
                grid-gap: 1em;
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

        <!-- Scripts -->

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="//cdn.chitika.net/getads.js" async></script>
		<script>
            // Box Shadow Script
			// We'll move all the scripts and styles out when elixir is setup
			$(window).on('scroll', function() {
				if ($(window).scrollTop() !== 0) {
				   $('#nav').addClass('box-shadow');
				}
				else {
				   $('#nav').removeClass('box-shadow');
				   $('#nav').addClass('no-box-shadow');
				}
			});
        </script>
        <script>
            // Search Script
            $(window).on('keyup', () => {
                let search = $('#searchBox').val().replace(/\s/g, '|');
                $.get('/api/search', {term: search}).done(function (data) {
                    $('.grid-container').empty();
                    $.each(JSON.parse(data), function(index, quote) {
                        if ((index + 1) % 7 == 0) {
                            $('.grid-container').append(buildAdCard());
                        } else {
                            $('.grid-container').append(buildCard(quote));
                        }
                    });
                });
                // reload ads after the cards are built
                setTimeout(function(){
                    loadAds();
                }, 500);
            });

            function buildCard(quote) {
                let $card = $('<div class="quote-card"></div>');

                let $quote = $('<div class="quote-text">' + quote['Quote'] + '</div>');
                let $author = $('<div class="quote-author">' + quote['Author'] + '</div>');
                let $source = $('<div class="quote-source"><a href="' + quote['Source_Link'] + '">' + quote['Context'] + '</a></div>');

                $card.append($quote);
                $card.append($author);
                $card.append($source);

                return $card;
            }

            function buildAdCard() {
                let $card = $('<div class="ad-box"></div>');
                return $card;
            }

            function buildAdBox($adBox) {
                var unit = {
                    "calltype":"async[2]",
                    "publisher": "gngcp",
                    "width":300,
                    "height":250,
                    "sid": "Chitika Default"
                };
                if (window.CHITIKA === undefined) { window.CHITIKA = { 'units' : [] }; };
                var placement_id = window.CHITIKA.units.length;
                window.CHITIKA.units.push(unit);
                $adBox.innerHTML = '<div id="chitikaAdBlock-' + placement_id + '"></div>';
            }

            function loadAds() {
                var $adBoxes = document.getElementsByClassName('ad-box');
                for(var i=0; i<$adBoxes.length; i++){
                    buildAdBox($adBoxes[i]);
                }
            }
        </script>
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

        <div id="nav" class="links persist-top no-box-shadow">
            <a href="#" class="no-left-padding">Flash Quotes</a>
            <form class="search-box">
                <input id="searchBox" type="text" name="search">
            </form>
        </div>

        <div class="grid-container">
@foreach ($quotes as $quote)
    @if ($loop->iteration % 7 == 0)
            <div class="ad-box">
                <script> loadAds(); </script>
            </div>
    @else
            <div class="quote-card">
                <div class="quote-text">{{ $quote->Quote }}</div>
                <div class="quote-author"> - {{ $quote->Author }}</div>
                <div class="quote-source"><a href="{{ $quote->Source_Link }}">{{ $quote->Context }}</a></div>
            </div>
    @endif
@endforeach
        </div>
        </div>
    </body>
</html>
