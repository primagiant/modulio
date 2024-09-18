<div
    class="app-menu w-vertical-menu bg-vertical-menu ltr:border-r rtl:border-l border-vertical-menu-border fixed bottom-0 top-0 z-[1003] transition-all duration-75 ease-linear group-data-[sidebar-size=md]:w-vertical-menu-md group-data-[sidebar-size=sm]:w-vertical-menu-sm group-data-[sidebar-size=sm]:pt-header group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar=dark]:border-vertical-menu-dark group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar=brand]:border-vertical-menu-brand group-data-[sidebar=modern]:bg-gradient-to-tr group-data-[sidebar=modern]:to-vertical-menu-to-modern group-data-[sidebar=modern]:from-vertical-menu-form-modern group-data-[layout=horizontal]:w-full group-data-[layout=horizontal]:bottom-auto group-data-[layout=horizontal]:top-header hidden md:block print:hidden group-data-[sidebar-size=sm]:absolute group-data-[sidebar=modern]:border-vertical-menu-border-modern group-data-[layout=horizontal]:dark:bg-zink-700 group-data-[layout=horizontal]:border-t group-data-[layout=horizontal]:dark:border-zink-500 group-data-[layout=horizontal]:border-r-0 group-data-[sidebar=dark]:dark:bg-zink-700 group-data-[sidebar=dark]:dark:border-zink-600 group-data-[layout=horizontal]:group-data-[navbar=scroll]:absolute group-data-[layout=horizontal]:group-data-[navbar=bordered]:top-[calc(theme('spacing.header')_+_theme('spacing.4'))] group-data-[layout=horizontal]:group-data-[navbar=bordered]:inset-x-4 group-data-[layout=horizontal]:group-data-[navbar=hidden]:top-0 group-data-[layout=horizontal]:group-data-[navbar=hidden]:h-16 group-data-[layout=horizontal]:group-data-[navbar=bordered]:w-[calc(100%_-_2rem)] group-data-[layout=horizontal]:group-data-[navbar=bordered]:[&.sticky]:top-header group-data-[layout=horizontal]:group-data-[navbar=bordered]:rounded-b-md group-data-[layout=horizontal]:shadow-md group-data-[layout=horizontal]:shadow-slate-500/10 group-data-[layout=horizontal]:dark:shadow-zink-500/10 group-data-[layout=horizontal]:opacity-0">
    <div
        class="flex items-center justify-center px-5 text-center h-header group-data-[layout=horizontal]:hidden group-data-[sidebar-size=sm]:fixed group-data-[sidebar-size=sm]:top-0 group-data-[sidebar-size=sm]:bg-vertical-menu group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:bg-vertical-menu-dark group-data-[sidebar-size=sm]:group-data-[sidebar=brand]:bg-vertical-menu-brand group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:bg-gradient-to-br group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:to-vertical-menu-to-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:from-vertical-menu-form-modern group-data-[sidebar-size=sm]:group-data-[sidebar=modern]:bg-vertical-menu-modern group-data-[sidebar-size=sm]:z-10 group-data-[sidebar-size=sm]:w-[calc(theme('spacing.vertical-menu-sm')_-_1px)] group-data-[sidebar-size=sm]:group-data-[sidebar=dark]:dark:bg-zink-700">
        <a href="{{ url('/') }}"
            class="group-data-[sidebar=dark]:hidden group-data-[sidebar=brand]:hidden group-data-[sidebar=modern]:hidden">
            <span class="hidden group-data-[sidebar-size=sm]:block">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" class="h-12 mx-auto">
            </span>
            <span class="group-data-[sidebar-size=sm]:hidden">
                <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" class="h-12 mx-auto">
            </span>
        </a>
        <a href="{{ url('/') }}"
            class="hidden group-data-[sidebar=dark]:block group-data-[sidebar=brand]:block group-data-[sidebar=modern]:block">
            <span class="hidden group-data-[sidebar-size=sm]:block">
                <img src="{{ URL::asset('build/images/logo-sm.png') }}" alt="" class="h-12 mx-auto">
            </span>
            <span class="group-data-[sidebar-size=sm]:hidden">
                <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" class="h-12 mx-auto">
            </span>
        </a>
        <button type="button" class="hidden p-0 float-end" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar"
        class="group-data-[sidebar-size=md]:max-h-[calc(100vh_-_theme('spacing.header')_*_1.2)] group-data-[sidebar-size=lg]:max-h-[calc(100vh_-_theme('spacing.header')_*_1.2)] group-data-[layout=horizontal]:h-56 group-data-[layout=horizontal]:md:h-auto group-data-[layout=horizontal]:overflow-auto group-data-[layout=horizontal]:md:overflow-visible group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:mx-auto">
        <div>
            <ul class="group-data-[layout=horizontal]:flex group-data-[layout=horizontal]:flex-col group-data-[layout=horizontal]:md:flex-row"
                id="navbar-nav">
                {{-- Menu Admin --}}
                @if (Auth::user()->role == 0)
                    @include('layouts.sidebar-item.admin')
                @endif
                {{-- End Menu Admin --}}

                {{-- Menu Teacher --}}
                @if (Auth::user()->role == 1)
                    @include('layouts.sidebar-item.teacher')
                @endif
                {{-- End Menu Teacher --}}

                {{-- Menu Student --}}
                @if (Auth::user()->role == 2)
                    @include('layouts.sidebar-item.student')
                @endif
                {{-- End Menu Student --}}
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
<div id="sidebar-overlay" class="absolute inset-0 z-[1002] bg-slate-500/30 hidden"></div>
