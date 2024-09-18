<div class="2xl:h-fit">
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <h6 class="text-15">Detail Module</h6>
            </div>
            <div class="flex flex-col gap-3 ">
                <button type="button"
                    class="flex justify-between w-full bg-white border-dashed item-center shrink-0 text-custom-500 btn border-custom-500 hover:text-custom-500 hover:bg-custom-50 hover:border-custom-600 focus:text-custom-600 focus:bg-custom-50 focus:border-custom-600 active:text-custom-600 active:bg-custom-50 active:border-custom-600 dark:bg-zink-700 dark:ring-custom-400/20 dark:hover:bg-custom-800/20 dark:focus:bg-custom-800/20 dark:active:bg-custom-800/20">
                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-slideshow-3-line"></i>
                    Lihat Tampilan Modul
                </button>
                @if (!$module->is_show)
                    <button type="button" wire:click='showModule()'
                        class="flex justify-between w-full text-green-500 bg-white border-green-500 border-dashed item-center shrink-0 btn hover:text-green-500 hover:bg-green-50 hover:border-green-600 focus:text-green-600 focus:bg-green-50 focus:border-green-600 active:text-green-600 active:bg-green-50 active:border-green-600 dark:bg-zink-700 dark:ring-green-400/20 dark:hover:bg-green-800/20 dark:focus:bg-green-800/20 dark:active:bg-green-800/20">
                        <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-eye-line"></i>
                        Perlihatkan Modul
                    </button>
                @else
                    <button type="button" wire:click='hideModule()'
                        class="flex justify-between w-full text-red-500 bg-white border-red-500 border-dashed item-center shrink-0 btn hover:text-red-500 hover:bg-red-50 hover:border-red-600 focus:text-red-600 focus:bg-red-50 focus:border-red-600 active:text-red-600 active:bg-red-50 active:border-red-600 dark:bg-zink-700 dark:ring-red-400/20 dark:hover:bg-red-800/20 dark:focus:bg-red-800/20 dark:active:bg-red-800/20">
                        <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-eye-off-line"></i>
                        Jangan Perlihatkan Modul
                    </button>
                @endif
                <div class="flex items-center">
                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-information-line"></i>
                    @if (!$module->is_show)
                        <p class="text-sm text-red">
                            Modul tidak terlihat oleh Siswa
                        </p>
                    @else
                        <p class="text-sm">
                            Modul terlihat oleh Siswa
                        </p>
                    @endif
                </div>
            </div>
            <hr class="my-3 dark:bg-zink-500">
            <div class="mb-3">
                <h6 class="text-15">Opsi Lain</h6>
            </div>
            <div class="flex flex-col gap-3 ">
                <a href="{{ route('teacher.module.question', ['classId' => $classId, 'moduleId' => $moduleId]) }}"
                    class="flex justify-between w-full text-yellow-500 bg-white border-yellow-500 border-dashed item-center shrink-0 btn hover:text-yellow-500 hover:bg-yellow-50 hover:border-yellow-600 focus:text-yellow-600 focus:bg-yellow-50 focus:border-yellow-600 active:text-yellow-600 active:bg-yellow-50 active:border-yellow-600 dark:bg-zink-700 dark:ring-yellow-400/20 dark:hover:bg-yellow-800/20 dark:focus:bg-yellow-800/20 dark:active:bg-yellow-800/20">
                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-survey-line"></i>
                    Atur Soal
                </a>

                <a href="{{ route('teacher.edit.module', ['classId' => $classId, 'moduleId' => $moduleId]) }}"
                    class="flex justify-between w-full text-green-500 bg-white border-green-500 border-dashed item-center shrink-0 btn hover:text-green-500 hover:bg-green-50 hover:border-green-600 focus:text-green-600 focus:bg-green-50 focus:border-green-600 active:text-green-600 active:bg-green-50 active:border-green-600 dark:bg-zink-700 dark:ring-green-400/20 dark:hover:bg-green-800/20 dark:focus:bg-green-800/20 dark:active:bg-green-800/20">
                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-settings-2-line"></i>
                    Ubah Modul
                </a>

                <button type="button" data-modal-target="deleteModal"
                    class="flex justify-between w-full text-red-500 bg-white border-red-500 border-dashed item-center shrink-0 btn hover:text-red-500 hover:bg-red-50 hover:border-red-600 focus:text-red-600 focus:bg-red-50 focus:border-red-600 active:text-red-600 active:bg-red-50 active:border-red-600 dark:bg-zink-700 dark:ring-red-400/20 dark:hover:bg-red-800/20 dark:focus:bg-red-800/20 dark:active:bg-red-800/20">
                    <i class="align-baseline ltr:pr-1 rtl:pl-1 ri-delete-bin-line"></i>
                    Hapus Modul
                </button>
            </div>
        </div>
    </div>
</div>
