<!doctype html>
<html lang="{{app()->getLocale()}}" dir="{{is_rtl() ? 'rtl': 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',__('dashboard')) - Lareon</title>
    @vite(['Lareon/CMS/resources/css/app.css','Lareon/CMS/resources/js/app.js','Lareon/CMS/resources/js/javascript.js'])
    @stack('headerScripts')
</head>
<body>
<main class="max-h-svh h-svh min-h-svh bg-center bg-cover bg-no-repeat bg-theme-3 p-3">
    <div class="flex items-center justify-center h-full">
        <div class="bg-white md:w-3/4 max-w-3xl py-6 px-12 flex items-center justify-center">
            {!! $slot !!}
            <div>
                <x-lareon::auth.auth-session-status />
            </div>
        </div>
    </div>
</main>

</body>
</html>
