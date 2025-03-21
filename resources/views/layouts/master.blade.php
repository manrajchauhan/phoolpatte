
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>@yield('title', 'PhoolPatte | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')</title>

    @yield('meta-tags')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    @include("includes.base")

</head>
<body>

    @include("includes.navbar")

    <div class="main">
        @yield('content')
    </div>

    @include("includes.footer")

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/active.js') }}"></script>

</body>
</html>
