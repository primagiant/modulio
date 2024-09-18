<script src='{{ URL::asset('build/libs/choices.js/public/assets/scripts/choices.min.js') }}'></script>
<script src="{{ URL::asset('build/libs/@popperjs/core/umd/popper.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/tippy.js/tippy-bundle.umd.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
<script src="{{ URL::asset('build/libs/lucide/umd/lucide.js') }}"></script>
<script src="{{ URL::asset('build/js/tailwick.bundle.js') }}"></script>

<!-- Sweet Alert js -->
<script src="{{ URL::asset('build\libs\sweetalert2\sweetalert2.all.js') }}"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    document.addEventListener('sweet-alert', (event) => {
        Toast.fire({
            icon: event.detail.icon,
            title: event.detail.title
        });
    })
</script>

<!-- Close Modal js -->
<script>
    document.addEventListener('close-modal', (event) => {
        const element = document.getElementById(event.detail.modalId)
        document.body.classList.toggle('overflow-hidden', false)
        element.classList.add('show')
        document.getElementById("backDropDiv").classList.add('hidden')
        setTimeout(() => {
            element.classList.add("hidden")
        }, 200)
    })
</script>

<!-- PDF js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });
</script>

<!-- Filter -->
<script src="{{ URL::asset('build/libs/read-smore/index.umd.js') }}"></script>
<script src="{{ URL::asset('build/js/pages/apps-notes.init.js') }}"></script>

@stack('scripts')

<!-- App js -->
<script src="{{ URL::asset('build/js/app.js') }}"></script>
