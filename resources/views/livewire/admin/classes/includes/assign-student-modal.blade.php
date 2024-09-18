<div wire:ignore.self id="assignStudentModal" modal-center
    class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">Assign Siswa ke Kelas</h5>
            <button data-modal-close="assignStudentModal" wire:ignore
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                    class="size-5"></i></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4 flex-col">
            <div class="relative mb-3 grow" wire:ignore>
                <input type="text" wire:model.live.debounce.300ms='searchOutsideStudent'
                    class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                    placeholder="Search for ..." autocomplete="off">
                <i data-lucide="search"
                    class="inline-block size-4 absolute ltr:left-2.5 rtl:right-2.5 top-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
            </div>
            @if ($outsideStudents->isNotEmpty())
                @foreach ($outsideStudents as $key => $student)
                    <div class='flex items-center justify-between p-2 mb-1 rounded-md bg-slate-100 dark:text-zink-200 dark:bg-zink-500'
                        wire:key='{{ $key }}'>
                        <div class="flex gap-2">
                            <div class="bg-green-100 rounded-full size-14 dark:bg-green-500/20 shrink-0">
                                <img src="{{ $student->profile_photo_url }}" alt="" class="rounded-full h-14">
                            </div>
                            <div class="grow">
                                <h6>{{ $student->name }}</h6>
                                <p class="text-sm text-slate-500 dark:text-zink-200">{{ $student->email }}</p>
                                <p class="text-sm text-slate-500 dark:text-zink-200">
                                    {{ isset($student->identity) ? $student->identity : '-' }}
                                </p>
                            </div>
                        </div>
                        <button wire:click='addUserToClass({{ $student->id }})'
                            class="mr-3 px-3 py-1.5 text-xs text-white transition-all duration-300 rounded-md bg-custom-500 hover:bg-custom-600">
                            Assign
                        </button>
                    </div>
                @endforeach

                @if ($outsideStudents->hasPages())
                    <div class="flex flex-col items-center mt-5 md:flex-row">
                        <div class="mb-4 grow md:mb-0">
                            <p class="text-slate-500 dark:text-zink-200">Showing <b>{{ $outsideStudents->firstItem() }}
                                    - {{ $outsideStudents->lastItem() }}</b>
                                of
                                <b>{{ $outsideStudents->total() }}</b> Results
                            </p>
                        </div>
                        <ul class="flex flex-wrap items-center gap-2 shrink-0">
                            @if (!$outsideStudents->onFirstPage())
                                <li>
                                    <button wire:click="previousPage('outside_student')"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                        <i class="mr-1 ri-arrow-left-s-line"></i>
                                        Prev
                                    </button>
                                </li>
                            @endif

                            @if ($outsideStudents->hasMorePages())
                                <li>
                                    <button wire:click="nextPage('outside_student')"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-50 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-custom-500 dark:[&.active]:text-custom-500 [&.active]:bg-custom-50 dark:[&.active]:bg-custom-500/10 [&.active]:border-custom-50 dark:[&.active]:border-custom-500/10 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                        Next
                                        <i class="mr-1 ri-arrow-right-s-line"></i>
                                    </button>
                                </li>
                            @endif

                        </ul>
                    </div>
                @endif
            @else
                <div class="noresult">
                    <div class="text-center p-7">
                        <h5 class="mb-2">Maaf! data siswa tidak ditemukan.</h5>
                        <p class="mb-0 text-slate-500 dark:text-zink-200">
                            Kami sudah mencari, namun tidak menemukan hasil.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
