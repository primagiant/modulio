<div wire:ignore.self id="deleteUserModule" modal-center
    class="flex hidden fixed left-2/4 flex-col transition-all duration-300 ease-in-out -translate-x-2/4 -translate-y-2/4 z-drawer show">
    <div class="w-screen md:w-[25rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto px-6 py-8">
            <div class="float-right">
                <button data-modal-close="deleteUserModule"
                    class="transition-all duration-200 ease-linear text-slate-500 hover:text-red-500"><i data-lucide="x"
                        class="size-5"></i></button>
            </div>
            <img src="{{ URL::asset('build/images/delete.png') }}" alt="" class="block mx-auto h-12">
            <div class="mt-5 text-center">
                <h5 class="mb-1">Apakah anda yakin?</h5>
                <p class="text-slate-500 dark:text-zink-200">Semua proses yang anda lakukan pada module tersebut akan di
                    hapus.</p>
                <div class="flex gap-2 justify-center mt-6">
                    <button type="button" data-modal-close="deleteUserModule"
                        class="bg-white text-slate-500 btn hover:text-slate-500 hover:bg-slate-100 focus:text-slate-500 focus:bg-slate-100 active:text-slate-500 active:bg-slate-100 dark:bg-zink-600 dark:hover:bg-slate-500/10 dark:focus:bg-slate-500/10 dark:active:bg-slate-500/10">Batal</button>
                    <button type="button" data-modal-close="deleteUserModule" wire:click='deactivateModule'
                        class="text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20">
                        Saya Yakin!</button>
                </div>
            </div>
        </div>
    </div>
</div>
