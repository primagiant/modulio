<div class="overflow-x-auto">
    @if ($classes->isNotEmpty())
        <table class="w-full whitespace-nowrap">
            <thead class="bg-slate-100 dark:bg-zink-600">
                <tr>
                    <th
                        class=" px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                        Class Name
                    </th>
                    <th
                        class=" px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                        Class Year
                    </th>
                    <th
                        class=" px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                        Class Semester
                    </th>
                    <th
                        class=" px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500 ltr:text-left rtl:text-right">
                        Class Status
                    </th>
                    <th class="text-center px-3.5 py-2.5 font-semibold border-b border-slate-200 dark:border-zink-500">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $elm)
                    <tr wire:key='{{ $elm->id }}'>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            {{ $elm->class_name }}
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            {{ $elm->year }}
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            <span
                                class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-yellow-100 border-transparent text-yellow-500 dark:bg-yellow-500/20 dark:border-transparent text-uppercase">
                                {{ $smtName[$elm->smt] }}
                            </span>
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            @if ($elm->status == 1)
                                <span
                                    class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-green-100 border-transparent text-green-500 dark:bg-green-500/20 dark:border-transparent text-uppercase">
                                    {{ $className[1] }}
                                </span>
                            @elseif ($elm->status == 0)
                                <span
                                    class="px-2.5 py-0.5 inline-block text-xs font-medium rounded border bg-red-100 border-transparent text-red-500 dark:bg-red-500/20 dark:border-transparent text-uppercase">
                                    {{ $className[0] }}
                                </span>
                            @endif
                        </td>
                        <td class="px-3.5 py-2.5 border-y border-slate-200 dark:border-zink-500">
                            <div class="flex justify-center gap-2">
                                <div class="manage">
                                    <a href="/class-management/manage/{{ $elm->id }}" wire:navigate
                                        class="py-1 text-xs text-white bg-yellow-500 border-yellow-500 btn hover:text-white hover:bg-yellow-600 hover:border-yellow-600 focus:text-white focus:bg-yellow-600 focus:border-yellow-600 focus:ring focus:ring-yellow-100 active:text-white active:bg-yellow-600 active:border-yellow-600 active:ring active:ring-yellow-100 dark:ring-custom-400/20 remove-item-btn">
                                        Manage Class
                                    </a>
                                </div>
                                <div class="edit">
                                    <button data-modal-target="editModal" wire:click='edit({{ $elm->id }})'
                                        class="py-1 text-xs text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 edit-item-btn">Edit</button>
                                </div>
                                <div class="remove">
                                    <button data-modal-target="deleteModal" wire:click='delete({{ $elm->id }})'
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
