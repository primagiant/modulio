<div class="2xl:h-fit card">
    <div class="card-body">
        <div class="grid grid-cols-4 gap-5 mt-3">
            <div class="flex flex-col items-center justify-center col-span-1 2xl:items-start 2xl:col-span-4">
                <p class="mb-1 text-xs text-slate-500 dark:text-zink-200">Nama Kelas</h6>
                <p class="font-bold text-center">{{ $detail->class_name }}</p>
            </div>
            <div class="flex flex-col items-center justify-center col-span-1 2xl:items-start 2xl:col-span-4">
                <p class="mb-1 text-xs text-slate-500 dark:text-zink-200">Tahun Kelas</h6>
                <p class="font-bold">{{ $detail->year }}</p>
            </div>
            <div class="flex flex-col items-center justify-center col-span-1 2xl:items-start 2xl:col-span-4">
                <p class="mb-1 text-xs text-slate-500 dark:text-zink-200">Semester Kelas</h6>
                <p class="font-bold">{{ $smt[$detail->smt] }}</p>
            </div>
            <div class="flex flex-col items-center justify-center col-span-1 2xl:items-start 2xl:col-span-4">
                <p class="mb-1 text-xs text-slate-500 dark:text-zink-200">Status Kelas</h6>
                <p class="font-bold">{{ $status[$detail->status] }}</p>
            </div>
        </div>
    </div>
</div>
