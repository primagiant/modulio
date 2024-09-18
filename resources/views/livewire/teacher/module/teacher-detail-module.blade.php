<div>
    @section('title')
        {{ __('Detail Module') }}
    @endsection
    <x-page-title-v2 title="Detail Module"
        desc="{{ ucwords($module->classes->class_name) }} | {{ ucwords($module->name) }}" pagetitle="Class Detail" />

    <div class="grid grid-cols-12 gap-x-5">
        <div class="col-span-12 md:order-1 2xl:col-span-9">
            @include('livewire.teacher.module.includes.list-student-card')
        </div>

        <div class="col-span-12 md:order-2 2xl:col-span-3">
            @include('livewire.teacher.module.includes.detail-module-option')
        </div>
    </div>

    @include('livewire.teacher.module.includes.delete-module-modal')


</div>
