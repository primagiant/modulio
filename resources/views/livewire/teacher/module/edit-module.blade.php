<div>
    @section('title')
        {{ __('Edit Module') }}
    @endsection
    <x-page-title-v2 title="Edit Module" desc='Modul {{ ucwords($module->name) }}' pagetitle="Module" />

    <div class="card">
        <div class="card-body">
            <form wire:submit='editModule'>
                @csrf
                <div class="grid grid-cols-1 gap-5 xl:grid-cols-12">
                    <div class="xl:col-span-12">
                        <label for="title" class="inline-block mb-2 text-base font-medium">
                            Judul Modul <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="title" wire:model='name'
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            placeholder="Isikan judul modul" required>
                        @error('name')
                            <span class="text-xs text-red-800">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="xl:col-span-12">
                        <label for="level-module-field" class="inline-block mb-2 text-base font-medium">
                            Level Module <span class="text-red-500">*</span>
                        </label>
                        <select wire:model='levelId' required
                            class="form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                            name="level-module-field" id="level-module-field">
                            <option value="" disabled selected>
                                Select Level Module
                            </option>
                            @foreach ($levels as $level)
                                <option wire:key='{{ $level->id }}' value="{{ $level->id }}">
                                    {{ $level->name }} - {{ $level->id }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="xl:col-span-4">
                        <label for="video_file_up" class="inline-block mb-2 text-base font-medium">Upload Video
                            (.MP4)</label>
                        <livewire:dropzone wire:key='video_file_up' wire:model="video" id='video_file_up'
                            :rules="['mimes:mp4', 'max:10420']" :multiple="true" />
                    </div>

                    <div class="xl:col-span-4">
                        <label for="pdf_file_upload" class="inline-block mb-2 text-base font-medium">Upload Document
                            (.PDF)</label>
                        <livewire:dropzone wire:key='pdf_file_upload' wire:model="document" id='pdf_file_upload'
                            :rules="['mimes:pdf', 'max:10420']" :multiple="true" />
                    </div>

                    <div class="xl:col-span-4">
                        <label for="audio_file_upload" class="inline-block mb-2 text-base font-medium">Upload
                            Audio (.MP3)</label>
                        <livewire:dropzone wire:key='audio_file_upload' wire:model="audio" id='audio_file_upload'
                            :rules="['mimes:mp3', 'max:10420']" :multiple="true" />
                    </div>

                    <div class="xl:col-span-12" wire:ignore>
                        <label for="desc-editor" class="inline-block mb-2 text-base font-medium">
                            Deskripsi Modul <span class="text-red-500">*</span>
                        </label>
                        <textarea id="desc-editor" class="text-slate-800">
                        </textarea>
                    </div>

                    <div class="xl:col-span-12" wire:ignore>
                        <label for="source-editor" class="inline-block mb-2 text-base font-medium">
                            Sumber <span class="text-red-500">*</span>
                        </label>
                        <textarea id="source-editor" class="text-slate-800">
                        </textarea>
                    </div>

                    <div class="xl:col-span-12">
                        <div class="flex justify-end gap-2">
                            <button type="submit" wire:ignore
                                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20"><i
                                    data-lucide="save" class="inline-block mr-1 size-4"></i> <span class="align-middle">
                                    Simpan Module Baru
                                </span>
                            </button>
                        </div>
                    </div>

                </div><!--end grid-->
            </form>
        </div>
    </div><!--end card-->

    @push('ckeditor')
        <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#desc-editor'), {
                    initialData: `{!! $desc !!}`,
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('desc', editor.getData())
                    })
                })
                .catch(function(error) {
                    console.error(error);
                });

            ClassicEditor
                .create(document.querySelector('#source-editor'), {
                    initialData: `{!! $source !!}`,
                })
                .then(editor => {
                    editor.model.document.on('change:data', () => {
                        @this.set('source', editor.getData())
                    })
                })
                .catch(function(error) {
                    console.error(error);
                });
        </script>
    @endpush
</div>
