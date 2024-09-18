<div>
    @section('title')
        {{ __('Notes') }}
    @endsection
    <!-- page title -->
    <x-page-title title="List Module | Kelas {{ $class_name }} " pagetitle="Class Detail" />

    <div class="card">
        <div class="card-body">
            <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                <div class="xl:col-span-4">
                    <ul class="flex flex-wrap gap-2 w-full text-sm font-medium text-center filter-btns grow"
                        data-filter-target="notes-list">
                        <li>
                            <a href="javascript:void(0);" data-filter="all"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear active rounded-md text-slate-500 dark:text-zink-200 border border-transparent [&.active]:bg-custom-500 dar:[&.active]:bg-custom-500 [&.active]:text-white dark:[&.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">All</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-filter="inactive"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent [&.active]:bg-custom-500 dar:[&.active]:bg-custom-500 [&.active]:text-white dark:[&.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">In-Active</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-filter="onprogress"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent [&.active]:bg-custom-500 dar:[&.active]:bg-custom-500 [&.active]:text-white dark:[&.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">On-Progress</a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" data-filter="completed"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-md text-slate-500 dark:text-zink-200 border border-transparent [&.active]:bg-custom-500 dar:[&.active]:bg-custom-500 [&.active]:text-white dark:[&.active]:text-white hover:text-custom-500 dark:hover:text-custom-500 active:text-custom-500 dark:active:text-custom-500 -mb-[1px]">Completed</a>
                        </li>
                    </ul>
                </div>

                <div class="xl:col-start-10 xl:col-span-3">
                    <div class="flex gap-3">
                        <div class="relative grow">
                            <input type="text"
                                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                                placeholder="Search for ..." autocomplete="off">
                            <i data-lucide="search"
                                class="inline-block absolute top-2.5 size-4 ltr:left-2.5 rtl:right-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                        </div>
                    </div>
                </div><!--end col-->

            </div>
        </div>
    </div><!--end card-->

    @if ($modules->isNotEmpty())
        <div>
            <div class="grid grid-cols-1 mt-5 md:grid-cols-2 [&.gridView]:grid-cols-1 xl:grid-cols-4 group [&.gridView]:xl:grid-cols-1 gap-x-5"
                id="notes-list">
                @foreach ($modules as $module)
                    @php $status = $module->getStatus(); @endphp
                    <div @class([
                        'card product-item',
                        'inactive' => $status == 0,
                        'onprogress' => $status == 1,
                        'completed' => $status == 2,
                    ])>
                        <div class="flex flex-col w-full h-full card-body" x-on:click='test'>
                            <div>
                                <div class="relative ltr:float-right rtl:float-left dropdown">
                                    @if ($status == 0)
                                        <button title="Kerjakan Module" key="btn-kerjakan-{{ $moduleId }}"
                                            wire:click='activateModule({{ $module->id }})'
                                            data-modal-close="deleteUserModule"
                                            class="flex items-center justify-center w-[30px] h-[30px] dropdown-toggle p-0 text-custom-500 btn bg-custom-100 hover:text-white hover:bg-custom-600 focus:text-white focus:bg-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:ring active:ring-custom-100 dark:bg-custom-500/20 dark:text-custom-400 dark:hover:bg-custom-500 dark:hover:text-white dark:focus:bg-custom-500 dark:focus:text-white dark:active:bg-custom-500 dark:active:text-white dark:ring-custom-400/20">
                                            <i class="block ri-add-line"></i>
                                        </button>
                                    @endif
                                    @if ($status == 1)
                                        <button title="Batal Mengerjakan Module"
                                            wire:click='setModuleId({{ $module->id }})'
                                            data-modal-target="deleteUserModule"
                                            class="flex items-center justify-center w-[30px] h-[30px] dropdown-toggle p-0 text-red-500 btn bg-red-100 hover:text-white hover:bg-red-600 focus:text-white focus:bg-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:ring active:ring-red-100 dark:bg-red-500/20 dark:text-red-400 dark:hover:bg-red-500 dark:hover:text-white dark:focus:bg-red-500 dark:focus:text-white dark:active:bg-red-500 dark:active:text-white dark:ring-red-400/20">
                                            <i class="block ri-logout-box-line"></i>
                                        </button>
                                    @endif
                                </div>
                                <div class="flex gap-2 items-center mb-5">
                                    @if ($status != 0)
                                        <h5 wire:click='openUserModule({{ $module->id }})'
                                            class="cursor-pointer text-16">
                                            {{ $module->name }}
                                        </h5>
                                    @else
                                        <h5 class="text-16">{{ $module->name }}</h5>
                                    @endif
                                </div>
                            </div>

                            <div class="js-read-smore" data-read-smore-words="40" data-read-smore-inline="true">
                                <p class="text-slate-500 dark:text-zink-200">
                                    {{ substr(strip_tags($module->desc), 0, 140) }} <span
                                        title="{{ strip_tags($module->desc) }}"
                                        class="px-2 rounded cursor-help bg-slate-200">. .
                                        .</span>
                                </p>
                            </div>

                            <div class="flex gap-3 justify-between items-center pt-4 mt-auto">
                                <div class="shrink-0">
                                    @if ($status == 0)
                                        <span
                                            class="inline-block px-2.5 py-0.5 text-xs font-medium text-orange-500 bg-orange-100 rounded border border-orange-200 dark:bg-orange-500/20 dark:border-orange-500/20">Inactive</span>
                                    @elseif ($status == 1)
                                        <span
                                            class="inline-block px-2.5 py-0.5 text-xs font-medium text-sky-500 bg-sky-100 rounded border border-sky-200 dark:bg-sky-500/20 dark:border-sky-500/20">On-Progress</span>
                                    @elseif ($status == 2)
                                        <span
                                            class="inline-block px-2.5 py-0.5 text-xs font-medium text-green-500 bg-green-100 rounded border border-green-200 dark:bg-green-500/20 dark:border-green-500/20">Completed</span>
                                    @endif
                                </div>
                                <p class="text-slate-500 dark:text-zink-200 shrink-0">{{ $module->level->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div><!--end grid-->

            @if ($modules->hasPages())
                <div class="flex flex-col items-center mb-5 md:flex-row">
                    <div class="mb-4 grow md:mb-0">
                        <p class="text-slate-500 dark:text-zink-200">
                            Showing <b>{{ $modules->firstItem() }} -
                                {{ $modules->lastItem() }}</b> of
                            <b>{{ $modules->total() }}</b> Results
                        </p>
                    </div>
                    <ul class="flex flex-wrap gap-2 items-center shrink-0">
                        @if (!$modules->onFirstPage())
                            <li>
                                <button wire:click="previousPage()"
                                    class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                    <i class="mr-1 ri-arrow-left-s-line"></i>
                                    Prev
                                </button>
                            </li>
                        @endif
                        @if ($modules->hasMorePages())
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
            <div class="p-7 text-center card">
                <h5 class="mb-2">Maaf! data tidak ditemukan.</h5>
                <p class="mb-0 text-slate-500 dark:text-zink-200">
                    Kami sudah mencari, namun tidak menemukan hasil.
                </p>
            </div>
        </div>
    @endif

    @include('livewire.student.include.modal.delete-user-module')
</div>
