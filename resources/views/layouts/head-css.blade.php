<!-- Layout config Js -->
<script src="{{ URL::asset('build/js/layout.js') }}"></script>
@stack('css')

<!-- Filter -->
<script src="{{ URL::asset('build/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('build/js/common.js') }}"></script>

<!-- Icons CSS -->
<link rel="stylesheet" href="{{ URL::asset('build/css/icons.min.css') }}">
<!-- Tailwind CSS -->
<link rel="stylesheet" href="{{ URL::asset('build/css/tailwind.min.css') }}">
<script>
    var app_url = '{{ env('APP_URL') }}'
</script>
