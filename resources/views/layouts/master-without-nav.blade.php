<!DOCTYPE html>
<html lang="en" class="light scroll-smooth group" data-layout="vertical" data-sidebar="light" data-sidebar-size="lg"
    data-mode="light" data-topbar="light" data-skin="default" data-navbar="sticky" data-content="fluid" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Modulio</title>
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Module Course" name="description">
    <meta content="Prima Giant" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    @include('layouts.head-css')
    <!-- Livewire Styles -->
    @livewireStyles
</head>

<!-- Content -->
@yield('content')


<!-- Vendor Script -->
@include('layouts.vendor-scripts')
<!-- Livewire cript -->
@livewireScripts

</body>

</html>
