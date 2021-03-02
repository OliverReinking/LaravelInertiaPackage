<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Inertia Package</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#312E81">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <meta name="msapplication-TileColor" content="#312E81">
    <meta name="msapplication-config" content="{{ asset('favicon/browserconfig.xml') }}">
    <meta name="theme-color" content="#312E81">

    <!-- Ziggy-Routes -->
    @routes
    <!-- CSS -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
</head>

<body id="root" class="bg-background text-on-background" v-cloak>
    @inertia

    <!-- Javascript -->
    <script src="{{ mix('/js/app.js') }}" defer></script>
</body>

</html>
