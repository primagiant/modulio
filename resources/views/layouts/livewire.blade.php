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
    <!-- Styles -->
    @livewireStyles
</head>

@include('layouts.body')
<div class="group-data-[sidebar-size=sm]:min-h-sm group-data-[sidebar-size=sm]:relative">
    <!-- sidebar -->
    @include('layouts.sidebar')
    <!-- topbar -->
    @include('layouts.topbar')
    <div class="relative min-h-screen group-data-[sidebar-size=sm]:min-h-sm">
        <!-- page wrapper -->
        @include('layouts.page-wrapper')

        <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
            <!-- content -->
            {{ $slot }}
        </div>
    </div>
    <!-- End Page-content -->
    <!-- footer -->
    @include('layouts.footer')
</div>
</div>
<!-- end main content -->
@stack('modals')
@include('layouts.customizer')
@include('layouts.livewire-vendor-scripts')
@livewireScripts

@stack('ckeditor')
</body>

</html>
