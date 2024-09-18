<div>
    @section('title')
        {{ __('Atur Soal') }}
    @endsection
    <x-page-title-v2 title="Atur Soal" desc="{{ ucwords($module->classes->class_name) }} | {{ ucwords($module->name) }}"
        pagetitle="Detail Modul" />

    <div class="flex flex-col gap-3 justify-between w-full xl:flex-row">
        <div>
            <input type="text" wire:model.live.debounce.300ms='search'
                class="ltr:pl-8 rtl:pr-8 search form-input border-slate-200 dark:border-zink-500 focus:outline-none focus:border-custom-500 disabled:bg-slate-100 dark:disabled:bg-zink-600 disabled:border-slate-300 dark:disabled:border-zink-500 dark:disabled:text-zink-200 disabled:text-slate-500 dark:text-zink-100 dark:bg-zink-700 dark:focus:border-custom-800 placeholder:text-slate-400 dark:placeholder:text-zink-200"
                placeholder="Search for ..." autocomplete="off">
            <i data-lucide="search"
                class="inline-block absolute top-2.5 size-4 ltr:left-2.5 rtl:right-2.5 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-600"></i>
        </div>
        <div class="lg:col-span-2 ltr:lg:text-right rtl:lg:text-left xl:col-span-2 xl:col-start-11">
            <button type="button" data-modal-target='addQuestionModal' wire:click='resetProperty'
                class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
                <i class="inline-block ri-add-line size-4"></i>
                <span class="align-middle">
                    Tambah Soal Baru
                </span>
            </button>
        </div>
    </div>

    @if ($questions->isNotEmpty())
        <div class="mt-3 card">
            <div class="card-body">

                <div class="overflow-x-auto">
                    <table class="w-full whitespace-normal">
                        <thead class="bg-slate-100 dark:bg-zink-600">
                            <tr>
                                <th
                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                    Soal
                                </th>
                                <th
                                    class="px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                                    Option
                                </th>
                                <th
                                    class="px-3.5 py-2.5 font-semibold text-center border-b border-slate-200 dark:border-zink-500">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $nomor = 1 @endphp
                            @foreach ($questions as $quest)
                                <tr class="border-y border-slate-200 dark:border-zink-500"
                                    wire:key='{{ $quest->id }}'>
                                    <td class="flex justify-start px-3.5 py-2.5">
                                        <p> {{ $questions->firstItem() - 1 + $nomor }}.</p>
                                        @php $nomor++ @endphp
                                    </td>
                                    <td class="flex justify-start px-3.5 py-2.5">
                                        <p>
                                            {{ $quest->text }}
                                        </p>
                                    </td>
                                    <td class="px-3.5 py-2.5">
                                        <ul class="flex flex-col gap-2">
                                            @foreach ($quest->quis_answers as $answer)
                                                <li @class([
                                                    'p-2 rounded-lg',
                                                    'bg-green-200' => $answer->status,
                                                    'bg-slate-200' => !$answer->status,
                                                ]) class="">
                                                    {{ $answer->text }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="flex justify-start px-3.5 py-2.5">
                                        <div class="flex gap-2 justify-start">
                                            <div class="edit">
                                                <button data-modal-target="editQuestionModal"
                                                    wire:click='editQuestion({{ $quest->id }})'
                                                    class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Edit</button>
                                            </div>
                                            <div class="remove">
                                                <button data-modal-target="deleteQuestConfirmModal"
                                                    wire:click='deleteQuestion({{ $quest->id }})'
                                                    class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">Remove</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if ($questions->hasPages())
                    <div class="flex flex-col items-center mt-3 md:flex-row">
                        <div class="mb-4 grow md:mb-0">
                            <p class="text-slate-500 dark:text-zink-200">
                                Showing <b>{{ $questions->firstItem() }} -
                                    {{ $questions->lastItem() }}</b> of
                                <b>{{ $questions->total() }}</b> Results
                            </p>
                        </div>
                        <ul class="flex flex-wrap gap-2 items-center shrink-0">
                            @if (!$questions->onFirstPage())
                                <li>
                                    <button wire:click="previousPage()"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                        <i class="mr-1 ri-arrow-left-s-line"></i>
                                        Prev
                                    </button>
                                </li>
                            @endif
                            @if ($questions->hasMorePages())
                                <li>
                                    <button wire:click="nextPage()"
                                        class="inline-flex items-center justify-center bg-white dark:bg-zink-700 h-8 px-3 transition-all duration-150 ease-linear border rounded border-slate-200 dark:border-zink-500 text-slate-500 dark:text-zink-200 hover:text-custom-500 dark:hover:text-custom-500 hover:bg-custom-100 dark:hover:bg-custom-500/10 focus:bg-custom-50 dark:focus:bg-custom-500/10 focus:text-custom-500 dark:focus:text-custom-500 [&.active]:text-white dark:[&.active]:text-white [&.active]:bg-custom-500 dark:[&.active]:bg-custom-500 [&.active]:border-custom-500 dark:[&.active]:border-custom-500 [&.active]:hover:text-custom-700 dark:[&.active]:hover:text-custom-700 [&.disabled]:text-slate-400 dark:[&.disabled]:text-zink-300 [&.disabled]:cursor-auto">
                                        Next
                                        <i class="mr-1 ri-arrow-right-s-line"></i>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    @else
        <div class="mt-5">
            <div class="p-7 text-center card">
                <h5 class="mb-2">Maaf! data tidak ditemukan.</h5>
                <p class="mb-0 text-slate-500 dark:text-zink-200">
                    Kami sudah mencari, namun tidak menemukan hasil.
                </p>
            </div>
        </div>
    @endif


    @include('livewire.teacher.module.includes.add-new-question-modal')
    @include('livewire.teacher.module.includes.edit-question-modal')
    @include('livewire.teacher.module.includes.delete-question-modal')
</div>
