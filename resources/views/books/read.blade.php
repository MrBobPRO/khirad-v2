<!DOCTYPE html>
<html lang="tj">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Хондани китоб | {{$book->title}}</title>
    <meta name="keywords" content="{{$book->title}}, книги, бесплатные книги, онлайн библиотека, купить книги в Таджикистане, читать книги онлайн"/>

    {{-- Opengraph --}}
    <meta name="description" content="{{ App\Helpers\Helper::generateShareText($book->description) }}">
    <meta property="og:description" content="{{ App\Helpers\Helper::generateShareText($book->description) }}">
    <meta property="og:locale" content="ru_RU" />
    <meta property="og:type" content="object" />
    <meta property="og:title" content="{{ $book->title }}" />
    <meta property="og:site_name" content="Хирад" />
    <meta property="og:image" content="{{ asset('img/books/' . $book->image )}}">
    <meta property="og:image:alt" content="{{ $book->title }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $book->title }}">
    <meta name="twitter:image" content="{{ asset('img/books/' . $book->image) }}">

    {{-- Favicons for all devices --}}
    <link rel="icon" href="{{ asset('img/main/cropped-favi-32x32.ico') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('img/main/cropped-favi-192x192.ico') }}" sizes="192x192">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('img/main/cropped-favi-180x180.ico') }}">
    <meta name="msapplication-TileImage" content="{{ asset('img/main/cropped-favi-256x256.ico') }}">

    <style>
        * {
            box-sizing: border-box;
        }
    body {
        height: 100vh;
        margin: 0;
        padding: 10px;
        background-color: #333;
    }
    .container {
        height: 100%;
        width: 100%;
    }
    .fullscreen {
        background-color: #333;
    }
    </style>
</head>

<body>
    <div class="container" id="container"></div>

    <script src="js/jquery.min.js"></script>
    <script src="js/three.min.js"></script>
    <script src="js/pdf.min.js"></script>
    <script src="js/3dflipbook.min.js"></script>

    <script type="text/javascript">
        $('#container').FlipBook({
            pdf: 'books/{{ $book->filename }}',
        
            controlsProps: {
                actions: {
                    cmdFullScreen: {
                        enabled: true,
                    },
                    cmdBackward: {
                        code: 37,
                    },
                    cmdForward: {
                        code: 39
                    },
                },
            },

            template: {
                sounds: {
                    startFlip: 'sounds/start-flip.mp3',
                    endFlip: 'sounds/end-flip.mp3'
                },
                html: 'templates/default-book-view.html',
                styles: [
                    'css/short-black-book-view.css'
                ],
                links: [
                    {
                        rel: 'stylesheet',
                        href: 'css/font-awesome.min.css'
                    }
                ],
                script: 'js/default-book-view.js'
            }
        });
    </script>
</body>

</html>