<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')

<body>
    <main class="main" id="top">
        @include('layouts.searchNavBar')
    </main>

    @include('layouts.navbar')
    @yield('content')
    @include('layouts.footerScripts')
</body>
