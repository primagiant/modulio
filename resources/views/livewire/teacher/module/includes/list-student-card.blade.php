<div class="card">
    <div class="card-body">

        <div class="grid items-center grid-cols-1 gap-3 mb-5 xl:grid-cols-12">
            <div class="xl:col-span-3">
                <h6 class="text-15">List Siswa</h6>
            </div>
            <div class="xl:col-span-6 xl:col-start-8">
                <div class="flex gap-3">
                    <div class="relative grow" wire:ignore>
                        <input type="text" wire:model.live.debounce.300ms='searchStudent'
                            class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Search for ..." autocomplete="off">
                        <i data-lucide="search"
                            class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="-mx-5 overflow-x-auto">
            @include('livewire.teacher.module.includes.student-module-table')
        </div>

        <div class="mt-5">
            {{ $usersModule->links() }}
        </div>

    </div>
</div>
