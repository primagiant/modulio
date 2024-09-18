@if ($students->isNotEmpty())
    <table class="w-full whitespace-nowrap">
        <thead class="ltr:text-left rtl:text-right bg-slate-100 text-slate-500 dark:text-zink-200 dark:bg-zink-600">
            <tr>
                <th
                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                    ID</th>
                <th
                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                    Deskripsi</th>
                <th
                    class="px-3.5 py-2.5 first:pl-5 last:pr-5 font-semibold border-y border-slate-200 dark:border-zink-500">
                    Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                        <a href="#!">{{ isset($student->identity) ? $student->identity : '-' }}</a>
                    </td>
                    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                        <div class="flex gap-2">
                            <div class="bg-green-100 rounded-full size-10 dark:bg-green-500/20 shrink-0">
                                <img src="{{ $student->profile_photo_url }}" alt="" class="h-10 rounded-full">
                            </div>
                            <div class="grow">
                                <h6>{{ $student->name }}</h6>
                                <p class="text-slate-500 dark:text-zink-200">{{ $student->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-3.5 py-2.5 first:pl-5 last:pr-5 border-y border-slate-200 dark:border-zink-500">
                        <div class="flex gap-2">
                            <button wire:click='removeUserFromClass({{ $student->id }})'
                                class="flex items-center justify-center transition-all duration-200 ease-linear rounded-md size-8 bg-slate-100 dark:bg-zink-600 dark:text-zink-200 text-slate-500 hover:text-red-500 dark:hover:text-red-500 hover:bg-red-100 dark:hover:bg-red-500/20">
                                <i class="ri-logout-box-r-line"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <div class="noresult">
        <div class="text-center p-7">
            <h5 class="mb-2">Maaf! data user tidak ditemukan.</h5>
            <p class="mb-0 text-slate-500 dark:text-zink-200">
                Kami sudah mencari, namun tidak menemukan hasil.
            </p>
        </div>
    </div>
@endif
