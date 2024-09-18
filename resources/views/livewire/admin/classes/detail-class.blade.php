<div>
    @section('title')
        {{ __('Detail Class List') }}
    @endsection
    <x-page-title title="Detail Class List" pagetitle="Class Management" />
    <div class="grid grid-cols-12 gap-x-5">
        <div class="col-span-12 md:order-1 2xl:col-span-5">
            @include('livewire.admin.classes.includes.detail-class-desc')

            <div class="2xl:h-fit">
                <div class="card">
                    <div class="card-body">

                        <div class="flex items-center justify-between mb-5">
                            <h6 class="text-15">List Pengajar</h6>
                            <button type="button" data-modal-target="assignTeacherModal"
                                class="bg-white border-dashed shrink-0 text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20">
                                <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-file-add-fill"></i>
                                Assign Pengajar
                            </button>
                        </div>

                        @include('livewire.admin.classes.includes.assigned-teacher-table')

                        <div class="mt-5">
                            {{ $teachers->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 md:order-2 2xl:col-span-7">
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
                                <button type="button" data-modal-target="assignStudentModal"
                                    class="bg-white border-dashed shrink-0 text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20">
                                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-file-add-fill"></i>
                                    Assign Siswa
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="-mx-5 overflow-x-auto">
                        @include('livewire.admin.classes.includes.assigned-student-table')
                    </div>

                    <div class="mt-5">
                        {{ $students->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('livewire.admin.classes.includes.assign-student-modal')
    @include('livewire.admin.classes.includes.assign-teacher-modal')
</div>
