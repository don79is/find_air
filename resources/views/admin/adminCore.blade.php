<!doctype html>
<html lang="EN">
<head>
    @include('admin.adminCss')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <title>Find Air</title>
    <link href="/css/app.css" rel=stylesheet>
</head>
<body>
@include('admin.adminMenu')
<div class="container">
@yield('content')
</div>

{{--@yield('form')--}}
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('scripts')
</html>