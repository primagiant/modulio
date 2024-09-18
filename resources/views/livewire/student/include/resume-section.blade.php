<div class="hidden tab-pane" id="resume">
    @if ($userModule->resume_start != null && $userModule->resume_end != null)
        <p class="">
            Anda telah selesai membaca seluruh materi yang tersedia pada modul ini. Sebagai langkah
            selanjutnya, mohon untuk melanjutkan ke tab "Resume" untuk melanjutkan proses
            berikutnya. Pastikan untuk membaca setiap bagian dengan seksama agar Anda tidak
            melewatkan informasi penting.
        </p>
        <p
            class="mt-5 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
            Waktu Pengerjaan Resume :
            {{ $this->resume_elapsed_time }}
        </p>
    @elseif ($userModule->resume_start != null)
        <p class="">
            Silakan tekan tombol "Simpan Resume" untuk menyimpan hasil pekerjaan anda. Waktu pengerjaan resume akan
            disimpan saat menekan tombol "Simpan Resume". Pastikan menuliskan resume dengan baik agar proses belajar
            dapat berjalan dengan lancar.
        </p>
        <button type="button" data-modal-target='endSaveResumeModal'
            class="mt-5 mb-5 text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
            Simpan Resume
        </button>

        @push('ckeditor')
        @endpush
    @else
        <p class="">
            Silakan tekan tombol "Mulai Modul" untuk memulai pengerjaan modul. Waktu pengerjaan
            modul akan dihitung saat anda mulai menekan tombol "Mulai Modul". Pastikan Anda siap
            membaca bacaan dengan baik agar proses belajar dapat berjalan dengan lancar. Selamat
            mengerjakan module.
        </p>
        <button type="button" data-modal-target='startResumeModal'
            class="mt-5 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
            Start Resume
        </button>
    @endif

    <!-- This is modal section -->
    @include('livewire.student.include.modal.start-resume-modal')
    @include('livewire.student.include.modal.end-save-resume-modal')
</div>
