@extends('layouts.master')
@section('title')
    {{ __('Dashboard') }}
@endsection
@section('content')
    <x-page-title title="Ecommerce" pagetitle="Dashboards" />

    <!-- start content -->
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
