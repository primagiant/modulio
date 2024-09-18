<div>
    @section('title')
        {{ __('List Kelas') }}
    @endsection
    <x-page-title title="List Kelas" pagetitle="Dashboard" />
    <div class="flex flex-col justify-between w-full gap-3 xl:flex-row">
        <div>
            <input type="text" wire:model.live.debounce.300ms='search'
                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                placeholder="Search for ..." autocomplete="off">
            <i
                class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
        </div>
    </div>

    @if ($classes->isNotEmpty())
        <div>
            <div
                class="grid grid-cols-1 mt-5 md:grid-cols-2 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5">
                @foreach ($classes as $cls)
                    <div class="card md:group-[.gridView]:flex relative">
                        <div
                            class="card-body md:group-[.gridView]:flex group-[.gridView]:!p-5 group-[.gridView]:gap-3 group-[.gridView]:grow">
                            <div class="group-[.gridView]:grow">
                                <h6 class="mb-1 truncate text-15">
                                    <p>{{ ucwords($cls->class_name) }}</p>
                                </h6>
                                <h5 class="mt-4 text-16">
                                    {{ $cls->modules->count() }}
                                    <small class="font-normal text-slate-500 dark:text-zink-200">Module</small>
                                </h5>
                            </div>

                            <div class="flex items-center gap-2 mt-4 group-[.gridView]:mt-0 group-[.gridView]:self-end">
                                <a href="{{ route('teacher.class.index', ['classId' => $cls->id]) }}"
                                    class="w-full bg-white border-dashed text-slate-500 btn border-slate-500 hover:text-custom-500 hover:bg-custom-100 hover:border-custom-600 focus:text-slate-600 focus:bg-slate-50 focus:border-slate-600 active:text-slate-600 active:bg-slate-50 active:border-slate-600 dark:bg-zink-700 dark:text-zink-200 dark:border-zink-400 dark:ring-zink-400/20 dark:hover:bg-zink-600 dark:hover:text-zink-100 dark:focus:bg-zink-600 dark:focus:text-zink-100 dark:active:bg-zink-600 dark:active:text-zink-100">
                                    <i class="inline-block leading-none ri-eye-line size-3"></i>
                                    <span class="align-middle">Overview</span>
                                </a>
                            </div>
                        </div>
                    </div><!--end col & card-->
                @endforeach
            </div><!--end grid-->

            @if ($classes->hasPages())
                <div class="flex flex-col items-center mb-5 md:flex-row">
                    <div class="mb-4 grow md:mb-0">
                        <p class="text-slate-500 dark:text-zink-200">
                            Showing <b>{{ $classes->firstItem() }} -
                                {{ $classes->lastItem() }}</b> of
                            <b>{{ $classes->total() }}</b> Results
                        </p>
                    </div>
                    <ul class="flex flex-wrap items-center gap-2 shrink-0">
                        @if (!$classes->onFirstPage())
                            <li>
                                <button wire:click="previousPage()"
                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                    <i class="mr-1 ri-arrow-left-s-line"></i>
                                    Prev
                                </button>
                            </li>
                        @endif
                        @if ($classes->hasMorePages())
                            <li>
                                <button wire:click="nextPage()"
                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                    Next
                                    <i class="mr-1 ri-arrow-right-s-line"></i>
                                </button>
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    @else
        <div class="mt-5">
            <div class="text-center p-7 card">
                <h5 class="mb-2">Maaf! data tidak ditemukan.</h5>
                <p class="mb-0 text-slate-500 dark:text-zink-200">
                    Kami sudah mencari, namun tidak menemukan hasil.
                </p>
            </div>
        </div>
    @endif

</div>
