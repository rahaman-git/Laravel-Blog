<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/schedule/public/css/all.css" />
    {{--<link rel="stylesheet" href="{{ elixir('css/all.css') }}" />--}}
    {{--<link rel="stylesheet" href="/public/css/all.css">--}}
</head>

<body>

    <div class="container">

        @include('partials.nav')

        {{--@include('partials.flash')--}}

        @include('flash::message')

        @yield('content')
    </div>

    {{--<script src="public/js/all.js"></script>--}}

    <script src="//code.jquery.com/jquery.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <script>
//        $('#flash-overlay-modal').modal();
        $('div.alert').not('.alert_important').delay(3000).slideUp(300);
    </script>

    @yield('footer')

</body>
</html>