<!doctype html>
<html lang="en">
    <head>
        <title>{{$title}} | Reading.com</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS v5.0.2 -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}" >
    </head>
    <body class="bg-light">
        <x-nav ></x-nav>
        <h3 class="text-center text-danger mt-5">{{$title}}</h3>
        
        <div class="container p-5 mt-5 mb-5 shadow-sm bg-white rounded-3">
            <div class="col-md-10 m-auto">
                {{$slot}}
            </div>
        </div>

        <x-footer fixedBottom={{$fixedBottom}}></x-footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script src="{{asset('js/reading.js')}}"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>