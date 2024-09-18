<div wire:ignore.self id="editQuestionModal" modal-center
    class="flex hidden fixed left-2/4 flex-col transition-all duration-300 ease-in-out -translate-x-2/4 -translate-y-2/4 z-drawer show">
    <div class="w-screen lg:w-[55rem] bg-white shadow rounded-md dark:bg-zink-600 flex flex-col h-full">
        <div class="flex justify-between items-center p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">Update Soal</h5>
            <button data-modal-close="editQuestionModal" wire:ignore
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                    class="size-5"></i></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
            <form class="tablelist-form" wire:submit='updateQuestion'>
                @csrf
                <div class="mb-3">
                    <label for="textSoal" class="inline-block mb-2 text-base font-medium">Text Soal <span
                            class="text-red-500">*</span></label>
                    <textarea type="text" wire:model='questionText'
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        id="textSoal" rows="3"></textarea>
                    @error('name')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="opsi1" class="inline-block mb-2 text-base font-medium">Opsi Pilihan 1 <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <textarea type="text" wire:model='option1'
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            id="opsi1" rows="1"></textarea>
                        @if ($nomorUrutJawaban == '1')
                            <label title="Kunci Jawaban"
                                class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Kunci
                            </label>
                        @else
                            <button type="button" title="Jadikan Kunci Jawaban" wire:click='setAnswer("1")'
                                class="text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/10"
                                id="update-btn"><i class="inline-block ri-checkbox-circle-line size-4"></i>
                            </button>
                        @endif
                    </div>
                    @error('email')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="opsi2" class="inline-block mb-2 text-base font-medium">Opsi Pilihan 2 <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <textarea type="text" wire:model='option2'
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            id="opsi2" rows="1"></textarea>
                        @if ($nomorUrutJawaban == '2')
                            <label title="Kunci Jawaban"
                                class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Kunci
                            </label>
                        @else
                            <button type="button" title="Jadikan Kunci Jawaban" wire:click='setAnswer("2")'
                                class="text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/10"
                                id="update-btn"><i class="inline-block ri-checkbox-circle-line size-4"></i>
                            </button>
                        @endif
                    </div>
                    @error('email')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="opsi3" class="inline-block mb-2 text-base font-medium">Opsi Pilihan 3 <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <textarea type="text" wire:model='option3'
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            id="opsi3" rows="1"></textarea>
                        @if ($nomorUrutJawaban == '3')
                            <label title="Kunci Jawaban"
                                class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Kunci
                            </label>
                        @else
                            <button type="button" title="Jadikan Kunci Jawaban" wire:click='setAnswer("3")'
                                class="text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/10"
                                id="update-btn"><i class="inline-block ri-checkbox-circle-line size-4"></i>
                            </button>
                        @endif
                    </div>
                    @error('email')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="opsi4" class="inline-block mb-2 text-base font-medium">Opsi Pilihan 4 <span
                            class="text-red-500">*</span></label>
                    <div class="flex gap-4">
                        <textarea type="text" wire:model='option4'
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            id="opsi4" rows="1"></textarea>
                        @if ($nomorUrutJawaban == '4')
                            <label title="Kunci Jawaban"
                                class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10">Kunci
                            </label>
                        @else
                            <button type="button" title="Jadikan Kunci Jawaban" wire:click='setAnswer("4")'
                                class="text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-yellow-400/10"
                                id="update-btn"><i class="inline-block ri-checkbox-circle-line size-4"></i>
                            </button>
                        @endif
                    </div>
                    @error('email')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex gap-2 justify-end">
                    <button type="submit"
                        class="text-white bg-custom-500 border-custom-500 btn hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/10"
                        id="update-btn">Update Soal</button>
                </div>
            </form>
        </div>
    </div>
</div>
