<!-- Vendor JS Files -->
<script src="{{ asset('theme/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('theme/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('theme/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('theme/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('theme/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('theme/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('theme/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('theme/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('theme/js/main.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
        });
    </script>
@endif

<!-- Código de SweetAlert2 para mostrar mensajes de sesión flash -->
@if (session()->has('message'))
    <script>
        const message = @json(session('message'));
        Swal.fire({
            icon: message.type,
            title: message.content
        });
    </script>
@endif