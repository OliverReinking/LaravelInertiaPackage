<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>Laravel Inertial Package</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#312E81">
    <meta name="msapplication-TileColor" content="#312E81">
    <meta name="msapplication-config" content="favicon/browserconfig.xml">
    <meta name="theme-color" content="#312E81">

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

</head>

<body id="root">
    <div id="app" class="flex flex-col">
        <!-- Header -->
        <header class="bg-header text-on-header h-24 z-20">
            <div class="max-w-7xl lg:max-w-app mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-center md:justify-between items-center h-24">
                    <div class="flex items-center justify-between">
                        <div class="hidden md:block">
                            <a href="/" class="hover:text-hover-on-header">
                                <div class="text-2xl font-bold tracking-wide">
                                    {!! config('laravelinertiapackage.name') !!}
                                </div>
                                <div class="text-sm font-medium tracking-wide">
                                {!! config('laravelinertiapackage.shortname') !!}
                                </div>
                                <!-- Demoversion -->
                                @if (config('laravelinertiapackage.demoversion'))
                                <div class="text-sm font-medium tracking-wide">
                                Attention: this is the demo version of the Laravel Inertia Package.
                                </div>
                                @endif
                            </a>
                        </div>

                    </div>
                    <div class="p-0 flex">
                        <a class="ml-2 block px-2 py-1 font-semibold rounded hover:bg-primary-lighter hover:text-on-primary" href="{{ route('login') }}">Login</a>
                        <a class="ml-2 block px-2 py-1 font-semibold rounded hover:bg-primary-lighter hover:text-on-primary" href="{{ route('register') }}">Registrierung</a>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
        <div class="px-4 mt-4">
            @yield('content')
        </div>
    </div>

</body>

</html>
