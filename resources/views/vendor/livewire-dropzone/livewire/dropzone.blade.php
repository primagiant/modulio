<div x-cloak x-data="dropzone({
    _this: @this,
    uuid: @js($uuid),
    multiple: @js($multiple),
})" @dragenter.prevent.document="onDragenter($event)"
    @dragleave.prevent="onDragleave($event)" @dragover.prevent="onDragover($event)" @drop.prevent="onDrop" class="">
    <div>
        @if (!is_null($error))
            <div class="w-full p-4 mb-4 rounded bg-red-50 dark:bg-red-600">
                <div class="flex items-start gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="w-5 h-5 text-red-400 dark:text-red-200">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z"
                            clip-rule="evenodd" />
                    </svg>
                    <h3 class="text-sm font-medium text-red-800 dark:text-red-100">{{ $error }}</h3>
                </div>
            </div>
        @endif
        <div @click="$refs.input.click()" :class="!isDragging ? '' : 'border-red-500'"
            class="flex items-center justify-center border-2 border-dashed rounded-md cursor-pointer bg-slate-100 dropzone border-slate-200 dark:bg-zink-600 dark:border-zink-500">
            <div>
                <div class="w-full py-5 text-lg text-center message needsclick">
                    <div class="mb-3" wire:ignore>
                        <i data-lucide="upload-cloud"
                            class="block mx-auto size-12 text-slate-500 fill-slate-200 dark:text-zink-200 dark:fill-zink-500"></i>
                    </div>

                    <h5 class="mb-0 font-normal text-slate-500 text-15">Drag and drop your files or <a
                            href="#!">browse</a> your files</h5>
                </div>
            </div>
            <input x-ref="input" wire:model="upload" type="file" class="hidden"
                x-on:livewire-upload-start="isLoading = true" x-on:livewire-upload-finish="isLoading = false"
                x-on:livewire-upload-error="console.log('livewire-dropzone upload error', error)"
                @if (!is_null($this->accept)) accept="{{ $this->accept }}" @endif
                @if ($multiple === true) multiple @endif>
        </div>

        <div class="flex justify-between w-full mt-2">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                @php
                    $hasMaxFileSize = !is_null($this->maxFileSize);
                    $hasMimes = !empty($this->mimes);
                @endphp

                @if ($hasMaxFileSize)
                    <p>{{ __('Max File Up To :size', ['size' => \Illuminate\Support\Number::fileSize($this->maxFileSize * 1024)]) }}
                    </p>
                @endif

                @if ($hasMaxFileSize && $hasMimes)
                    <p class="text-gray-400">-</p>
                @endif

                @if ($hasMimes)
                    <p>File Type Only ({{ Str::upper($this->mimes) }})</p>
                @endif
            </div>
            <div x-show="isLoading" role="status">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-700 fill-blue-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>

        @if (isset($files) && count($files) > 0)
            <div class="flex flex-wrap justify-start w-full mt-5 gap-x-10 gap-y-2">
                @foreach ($files as $file)
                    <div
                        class="flex items-center justify-between w-full h-auto gap-2 overflow-hidden border border-gray-200 rounded dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            @if ($this->isImageMime($file['extension']))
                                <div class="flex-none w-14 h-14">
                                    <img src="{{ $file['temporaryUrl'] }}" class="object-fill w-full h-full"
                                        alt="{{ $file['name'] }}">
                                </div>
                            @else
                                <div class="flex items-center justify-center bg-gray-100 w-14 h-14 dark:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                </div>
                            @endif
                            <div class="flex flex-col items-start gap-1">
                                <div class="text-sm font-medium text-center text-slate-900 dark:text-slate-100">
                                    {{ $file['name'] }}</div>
                                <div class="text-sm font-medium text-center text-gray-500">
                                    {{ \Illuminate\Support\Number::fileSize($file['size']) }}</div>
                            </div>
                        </div>
                        <div class="flex items-center mr-3">
                            <button type="button" @click="removeUpload('{{ $file['tmpFilename'] }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="w-6 h-6 text-black dark:text-white">
                                    <path fill-rule="evenodd"
                                        d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    @script
        <script>
            Alpine.data('dropzone', ({
                _this,
                uuid,
                multiple
            }) => {
                return ({
                    isDragging: false,
                    isDropped: false,
                    isLoading: false,

                    onDrop(e) {
                        this.isDropped = true
                        this.isDragging = false

                        const file = multiple ? e.dataTransfer.files : e.dataTransfer.files[0]

                        const args = ['upload', file, () => {
                            // Upload completed
                            this.isLoading = false
                        }, (error) => {
                            // An error occurred while uploading
                            console.log('livewire-dropzone upload error', error);
                        }, () => {
                            // Uploading is in progress
                            this.isLoading = true
                        }];

                        // Upload file(s)
                        multiple ? _this.uploadMultiple(...args) : _this.upload(...args)
                    },
                    onDragenter() {
                        this.isDragging = true
                    },
                    onDragleave() {
                        this.isDragging = false
                    },
                    onDragover() {
                        this.isDragging = true
                    },
                    removeUpload(tmpFilename) {
                        // Dispatch an event to remove the temporarily uploaded file
                        _this.dispatch(uuid + ':fileRemoved', {
                            tmpFilename
                        })
                    },
                });
            })
        </script>
    @endscript
</div>
