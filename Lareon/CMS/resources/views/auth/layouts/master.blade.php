<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{is_rtl() ? 'rtl': 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',__('dashboard')) - Lareon</title>
    @vite(['Lareon/CMS/resources/css/app.css','Lareon/CMS/resources/js/app.js'])
    @stack('headerScripts')
</head>
<body>
<main class="ms-auto me-0 transition-all duration-100 max-h-svh h-svh min-h-svh bg-center bg-cover bg-no-repeat bg-theme-3 p-3">
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 h-full items-stretch">
        <div class="bg-white py-6 px-12 flex items-center w-full">
            {!! $slot !!}
            <div>
                <x-lareon::auth.auth-session-status />
            </div>
        </div>
        <div class="lg:col-span-2 hidden sm:block">

        </div>
    </div>
</main>
</body>
</html>
