<div>
    @section('title')
        {{ __('Level Module') }}
    @endsection
    <x-page-title title="Level Module" pagetitle="Level Management" />
    <div class="card">
        <div class="card-body">
            <div class="grid grid-cols-1 gap-5 mb-5 xl:grid-cols-2">

                @include('livewire.commons.search-box')

                <div class="ltr:md:text-end rtl:md:text-start">
                    <button type="button" data-modal-target="createLevelModal" wire:click='resetProperty'
                        class="text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20 add-btn">
                        <i class="align-bottom ri-add-line me-1"></i> Tambah Level Modul
                    </button>
                </div>
            </div>

            @include('livewire.admin.levels.includes.level-table')

            <div class="mt-4">
                {{ $levels->links() }}
            </div>
        </div>
    </div>


    @include('livewire.admin.levels.includes.delete-level-modal')
    @include('livewire.admin.levels.includes.edit-level-modal')
    @include('livewire.admin.levels.includes.create-level-modal')
</div>
