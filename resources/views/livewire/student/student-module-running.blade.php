<div>
    @section('title')
        {{ __('Module') }}
    @endsection

    <div class="mt-5 card">
        <div class="card-body">
            <!-- page title -->
            <x-page-title-v3 title="Module {{ $module->name }} | Kelas {{ $className }}" pagetitle="Class Detail" />
            <div>
                <ul
                    class="flex flex-wrap w-full text-sm font-medium text-center border-b border-slate-200 dark:border-zink-500 nav-tabs">
                    <li class="group active">
                        <a href="javascript:void(0);" data-tab-toggle data-target="module"
                            class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Module</a>
                    </li>


                    @if ($userModule->module_end != null)
                        <li class="group">
                            <a href="javascript:void(0);" data-tab-toggle data-target="resume"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Resume</a>
                        </li>
                    @else
                        <li class="group">
                            <a href="javascript:void(0);"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                                <i class="ri-lock-2-line"></i>
                                Resume
                            </a>
                        </li>
                    @endif

                    @if ($userModule->quis_end != null)
                        <li class="group">
                            <a href="javascript:void(0);" data-tab-toggle data-target="quis"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Quis</a>
                        </li>
                    @else
                        <li class="group">
                            <a href="javascript:void(0);"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                                <i class="ri-lock-2-line"></i>
                                Quis
                            </a>
                        </li>
                    @endif

                    @if ($userModule->resume_end != null)
                        <li class="group">
                            <a href="javascript:void(0);" data-tab-toggle data-target="refleksi"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Refleksi</a>
                        </li>
                    @else
                        <li class="group">
                            <a href="javascript:void(0);"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                                <i class="ri-lock-2-line"></i>
                                Refleksi
                            </a>
                        </li>
                    @endif

                    @if ($userModule->reflection != null)
                        <li class="group">
                            <a href="javascript:void(0);" data-tab-toggle data-target="feedback"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">Feedback</a>
                        </li>
                    @else
                        <li class="group">
                            <a href="javascript:void(0);"
                                class="inline-block px-4 py-2 text-base transition-all duration-300 ease-linear rounded-t-md text-slate-500 dark:text-zink-200 border border-transparent group-[.active]:text-custom-500 group-[.active]:border-slate-200 dark:group-[.active]:border-zink-500 group-[.active]:border-b-white dark:group-[.active]:border-b-zink-700 hover:text-custom-500 active:text-custom-500 dark:hover:text-custom-500 dark:active:text-custom-500 dark:group-[.active]:hover:text-white -mb-[1px]">
                                <i class="ri-lock-2-line"></i>
                                Feedback
                            </a>
                        </li>
                    @endif
                </ul>

                <div class="mt-5 tab-content">

                    <!-- Module section -->
                    @include('livewire.student.include.module-section')

                    <!-- Resume section -->
                    @include('livewire.student.include.resume-section')

                    <!-- Quis section -->
                    @include('livewire.student.include.quis-section')

                    <!-- Reflection section -->
                    @include('livewire.student.include.reflection-section')

                    <!-- Feedback section -->
                    @include('livewire.student.include.feedback-section')

                </div>
            </div>
        </div>
    </div>
</div>
