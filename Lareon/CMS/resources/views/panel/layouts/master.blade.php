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
<body class="bg-slate-100" x-data="{sidebar:true ,togglesSidebar() { this.sidebar = !this.sidebar }}">
@include('lareon::panel.layouts.partials.upper-header')
<div class="p-3">
    @include('lareon::panel.layouts.partials.header')
</div>
<main class="ms-auto me-0 transition-all duration-100 ">
    @include('lareon::panel.layouts.partials.aside')
    <div class="me-0 ms-auto " :class="{'xl:w-5/6' : sidebar }">
        @include('lareon::panel.layouts.partials.lower-header')
        @include('lareon::panel.layouts.partials.errors')
        <div class="p-6">
            {!! $slot !!}
        </div>
    </div>
</main>
@include('lareon::panel.layouts.partials.footer')

</body>
</html>
