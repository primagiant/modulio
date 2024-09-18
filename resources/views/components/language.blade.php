<div class="relative dropdown text-end">
    <button type="button"
        class="inline-flex items-center gap-3 transition-all duration-200 ease-linear dropdown-toggle btn border-slate-200 dark:border-zink-400/60 group/items focus:border-custom-500 dark:focus:border-custom-500"
        id="dropdownMenuButton" data-bs-toggle="dropdown">
        @switch(Session::get('lang'))
            @case('id')
                <img src="{{ URL::asset('build/images/flags/id.svg') }}" alt="" id="header-lang-img"
                    class="object-cover h-5 rounded-full">
            @break

            @default
                <img src="{{ URL::asset('build/images/flags/us.svg') }}" alt="" id="header-lang-img"
                    class="object-cover h-5 rounded-full">
        @endswitch
        <h6
            class="text-base font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
            @switch(Session::get('lang'))
                @case('id')
                    Bahasa Indonesia
                @break

                @default
                    English
            @endswitch
        </h6>
    </button>

    <div class="absolute z-50 hidden p-3 mt-1 text-left list-none bg-white rounded-md shadow-md dropdown-menu min-w-[9rem] flex flex-col gap-3 dark:bg-zink-600"
        aria-labelledby="dropdownMenuButton">
        <a :href="url('index/en')" class="flex items-center gap-3 group/items">
            <img src="{{ URL::asset('build/images/flags/us.svg') }}" alt=""
                class="object-cover h-4 rounded-full">
            <h6
                class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                English</h6>
        </a>
        <a href="url('index/id')" class="flex items-center gap-3 group/items">
            <img src="{{ URL::asset('build/images/flags/id.svg') }}" alt=""
                class="object-cover h-4 rounded-full">
            <h6
                class="text-sm font-medium transition-all duration-200 ease-linear text-slate-600 group-hover/items:text-custom-500 dark:text-zink-200 dark:group-hover/items:text-custom-500">
                Bahasa Indonesia</h6>
        </a>
    </div>
</div>
