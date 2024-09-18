@extends('layouts.master-without-nav')
@section('title')
    {{ __('t-login') }}
@endsection
@section('content')

    <body
        class="flex items-center justify-center min-h-screen px-4 py-16 bg-cover bg-auth-pattern dark:bg-auth-pattern-dark dark:text-zink-100 font-public">
        <div class="mb-0 border-none shadow-none xl:w-2/3 card bg-white/70 dark:bg-zink-500/70">
            <div class="grid grid-cols-1 gap-0 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <div class="!px-12 !py-12 card-body">

                        <div class="text-center">
                            <h4 class="mb-2 text-orange-500 dark:text-orange-500">Welcome Back !</h4>
                            <p class="text-slate-500 dark:text-zink-200">Sign in to continue To {{ __('t-appname') }}.</p>
                        </div>

                        @if (session('status'))
                            <div
                                class="px-4 py-3 mt-4 text-sm font-medium text-green-600 border border-transparent rounded-md bg-green-50">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}" class="mt-10" id="signInForm">
                            @csrf
                            <div class="mb-3">
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" type="email" name="email" :value="old('email', 'admin@admin.com')" required autofocus
                                    autocomplete="username" placeholder="Enter your email" />
                                <x-input-error for="email" />
                            </div>
                            <div class="mb-3">
                                <div class="flex justify-between">
                                    <div>
                                        <x-label for="password" value="{{ __('Password') }}" />
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}"
                                                class="text-sm text-gray-500 dark:text-gray-100">Forgot password?</a>
                                        @endif
                                    </div>
                                </div>
                                <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                                    autocomplete="current-password" placeholder="Enter your password" value="password" />
                                <x-input-error for="password" />
                            </div>
                            <div>
                                <div class="flex items-center gap-2">
                                    <x-checkbox id="remember_me" name="remember" />
                                    <label for="checkboxDefault1"
                                        class="inline-block text-base font-medium align-middle cursor-pointer">Remember
                                        me</label>
                                </div>
                                <x-input-error for="remember" />
                            </div>
                            <div class="mt-5">
                                <button type="submit"
                                    class="w-full text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">Sign
                                    In</button>
                            </div>

                            <div class="mt-10 text-center">
                                <p class="mb-0 text-slate-500 dark:text-zink-200">Don't have an account ? <a
                                        href="{{ route('register') }}"
                                        class="font-semibold underline transition-all duration-150 ease-linear text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500">
                                        SignUp</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mx-2 mt-2 mb-2 border-none shadow-none lg:col-span-7 card bg-white/60 dark:bg-zink-500/60">
                    <div class="!px-10 !pt-10 h-full !pb-0 card-body flex flex-col">
                        <div class="flex items-center justify-between gap-3">
                            <div class="grow">
                                <a href="{{ url('index') }}">
                                    <x-application-logo />
                                </a>
                            </div>
                            <div class="shrink-0">
                                <x-language />
                            </div>
                        </div>
                        <div class="mt-auto">
                            <img src="{{ URL::asset('build/images/auth/img-01.png') }}" alt=""
                                class="md:max-w-[32rem] mx-auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
