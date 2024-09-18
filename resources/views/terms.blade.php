@extends('layouts.master-without-nav')
@section('title')
    {{ __('Terms') }}
@endsection
@section('content')
    <div class="pt-4 bg-gray-100">
        <div class="flex flex-col items-center min-h-screen pt-6 sm:pt-0">
            <div>
                <x-application-logo />
            </div>

            <div class="w-full p-6 mt-6 overflow-hidden prose bg-white shadow-md sm:max-w-2xl sm:rounded-lg">
                {!! $terms !!}
            </div>
        </div>
    </div>
@endsection
