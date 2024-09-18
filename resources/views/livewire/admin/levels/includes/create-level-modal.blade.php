<div wire:ignore.self id="createLevelModal" modal-center
    class="fixed flex flex-col hidden transition-all duration-300 ease-in-out left-2/4 z-drawer -translate-x-2/4 -translate-y-2/4 show">
    <div class="w-screen md:w-[30rem] bg-white shadow rounded-md dark:bg-zink-600">
        <div class="flex items-center justify-between p-4 border-b border-slate-200 dark:border-zink-500">
            <h5 class="text-16">Add New Level</h5>
            <button data-modal-close="createLevelModal" wire:ignore
                class="transition-all duration-200 ease-linear text-slate-400 hover:text-slate-500"><i data-lucide="x"
                    class="size-5"></i></button>
        </div>
        <div class="max-h-[calc(theme('height.screen')_-_180px)] overflow-y-auto p-4">
            <form class="tablelist-form" wire:submit='save'>
                @csrf
                <div class="mb-3">
                    <label for="user-name" class="inline-block mb-2 text-base font-medium">Name
                        <span class="text-red-500">*</span></label>
                    <input type="text" id="user-name" wire:model='name'
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        placeholder="Enter level name" required>
                    @error('name')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="desc-field" class="inline-block mb-2 text-base font-medium">Description <span
                            class="text-red-500">*</span></label>
                    <textarea id="desc-field" cols="30" rows="10"
                        class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                        wire:model='desc' placeholder="Enter description" required></textarea>
                    @error('desc')
                        <span class="text-xs text-red-800">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end gap-2">
                    <button type="submit"
                        class="text-white bg-green-500 border-green-500 btn hover:text-white hover:bg-green-600 hover:border-green-600 focus:text-white focus:bg-green-600 focus:border-green-600 focus:ring focus:ring-green-100 active:text-white active:bg-green-600 active:border-green-600 active:ring active:ring-green-100 dark:ring-green-400/10"
                        id="add-btn">Add Level</button>
                </div>
            </form>
        </div>
    </div>
</div>
