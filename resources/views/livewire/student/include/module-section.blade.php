<div class="block tab-pane" id="module">
    <p>
        @if ($userModule->module_start != null && $userModule->module_end != null)
            Anda telah selesai membaca seluruh materi yang tersedia pada modul ini. Sebagai langkah
            selanjutnya, mohon untuk melanjutkan ke tab "Resume" untuk melanjutkan proses
            berikutnya. Pastikan untuk membaca setiap bagian dengan seksama agar Anda tidak
            melewatkan informasi penting.
        @elseif ($userModule->module_start != null)
            Silakan tekan tombol "Akhiri Modul" untuk berhenti mengerjaan modul dan melanjutkan ke
            langkah selanjutnya. Waktu pengerjaan modul akan
            disimpan saat menekan tombol "Akhiri Modul". Pastikan Anda sudah membaca bacaan
            dengan baik agar proses belajar dapat berjalan dengan lancar.
        @else
            Silakan tekan tombol "Mulai Modul" untuk memulai pengerjaan modul. Waktu pengerjaan
            modul akan dihitung saat anda mulai menekan tombol "Mulai Modul". Pastikan Anda siap
            membaca bacaan dengan baik agar proses belajar dapat berjalan dengan lancar. Selamat
            mengerjakan module.
        @endif
    </p>
    @if ($userModule->module_start != null && $userModule->module_end != null)
        <div
            class="mt-5 text-white bg-custom-500 border-custom-500 btn hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
            Waktu Pengerjaan Membaca Modul :
            {{ $this->module_elapsed_time }}
        </div>
    @endif

    @if ($userModule->module_start != null && $userModule->module_end == null)
        <button type="button" data-modal-target='endModulModal'
            class="mt-5 mb-5 text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
            Akhiri Modul
        </button>
        @if ($module->pdf_path != null)
            <div class="relative">
                <div id="pdfViewer" class="flex flex-col w-full h-[30rem] overflow-auto rounded-md border"></div>

                <button type="button" id="fullscreenButton" onclick="toggleFullScreen()"'
                    class="absolute top-4 right-4 text-white bg-red-500 border-red-500 btn hover:text-white hover:bg-red-600 hover:border-red-600 focus:text-white focus:bg-red-600 focus:border-red-600 focus:ring focus:ring-red-100 active:text-white active:bg-red-600 active:border-red-600 active:ring active:ring-red-100 dark:ring-red-400/20">
                    Fullscreen
                </button>
            </div>
        @endif
    @endif

    @if ($userModule->module_start == null && $userModule->module_end == null)
        <button type="button" data-modal-target='startModulModal'
            class="mt-5 text-white btn bg-custom-500 border-custom-500 hover:text-white hover:bg-custom-600 hover:border-custom-600 focus:text-white focus:bg-custom-600 focus:border-custom-600 focus:ring focus:ring-custom-100 active:text-white active:bg-custom-600 active:border-custom-600 active:ring active:ring-custom-100 dark:ring-custom-400/20">
            Start Modul
        </button>
    @endif

    @push('ckeditor')
        <script>
            document.addEventListener('pdfreader:init', function() {
                var url = "{{ URL::asset('storage/' . $module->pdf_path) }}";

                // Load the PDF
                var loadingTask = pdfjsLib.getDocument(url);
                loadingTask.promise.then(function(pdf) {
                    // Get total number of pages
                    var totalPages = pdf.numPages;

                    // Loop through each page and render it
                    for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
                        pdf.getPage(pageNum).then(function(page) {
                            // Set the scale to dynamically fit the width of the container
                            var containerWidth = document.getElementById('pdfViewer').offsetWidth;
                            var scale = containerWidth / page.getViewport({
                                scale: 1
                            }).width;
                            var viewport = page.getViewport({
                                scale: scale
                            });

                            // Prepare canvas using PDF page dimensions
                            var canvas = document.createElement('canvas');
                            var context = canvas.getContext('2d');
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Append canvas to the PDF viewer
                            document.getElementById('pdfViewer').appendChild(canvas);

                            // Render PDF page into canvas context
                            var renderContext = {
                                canvasContext: context,
                                viewport: viewport
                            };
                            page.render(renderContext);
                        });
                    }
                });
            });

            // Fullscreen functionality
            function toggleFullScreen() {
                var element = document.getElementById('pdfViewer');
                if (element.requestFullscreen) {
                    element.requestFullscreen();
                } else if (element.mozRequestFullScreen) { // Firefox
                    element.mozRequestFullScreen();
                } else if (element.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                    element.webkitRequestFullscreen();
                } else if (element.msRequestFullscreen) { // IE/Edge
                    element.msRequestFullscreen();
                }
            }
        </script>
    @endpush

    <!-- This is modal section -->
    @include('livewire.student.include.modal.start-module-modal')
    @include('livewire.student.include.modal.end-module-modal')
</div>
