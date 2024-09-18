<div class="overflow-x-auto">
    @if ($levels->isNotEmpty())
        <table class="w-full whitespace-nowrap">
            <thead class="bg-slate-100 dark:bg-zink-600">
                <tr>
                    <th
                        class=" px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                        Level Modul
                    </th>
                    <th
                        class=" px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                        Deskripsi Level Modul
                    </th>
                    <th class="text-center px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $level)
                    <tr wire:key='{{ $level->id }}'>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            {{ $level->name }}
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            {{ $level->desc }}
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            <div class="flex justify-center gap-2">
                                <div class="edit">
                                    <button data-modal-target="editLevelModal" wire:click='edit({{ $level->id }})'
                                        class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Edit</button>
                                </div>
                                <div class="remove">
                                    <button data-modal-target="deleteLevelModal"
                                        wire:click='delete({{ $level->id }})'
                                        class="py-1 text-xs text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-custom-400/20 remove-item-btn">Remove</button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="noresult">
            <div class="text-center p-7">
                <h5 class="mb-2">Maaf! data tidak ditemukan.</h5>
                <p class="mb-0 text-slate-500 dark:text-zink-200">
                    Kami sudah mencari, namun tidak menemukan hasil.
                </p>
            </div>
        </div>
    @endif
</div>
