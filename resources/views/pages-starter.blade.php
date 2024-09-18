@extends('layouts.master')
@section('title')
    {{ __('Starter') }}
@endsection
@section('content')
    <!-- page title -->
    <x-page-title title="Starter" pagetitle="Pages" />
@endsection
@push('scripts')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endpush
