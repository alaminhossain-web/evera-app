<!-- Vendor JS-->
<script src="{{ asset('/') }}website/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/slick.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/jquery.syotimer.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/wow.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/jquery-ui.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/perfect-scrollbar.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/magnific-popup.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/select2.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/waypoints.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/counterup.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/jquery.countdown.min.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/images-loaded.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/isotope.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/scrollup.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/jquery.vticker-min.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/jquery.theia.sticky.js"></script>
<script src="{{ asset('/') }}website/assets/js/plugins/jquery.elevatezoom.js"></script>
<!-- Template  JS -->
<script src="{{ asset('/') }}website/assets/js/maind134.js?v=3.4"></script>
<script src="{{ asset('/') }}website/assets/js/shopd134.js?v=3.4"></script>
<!-- Toster js  -->
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js
 "></script>
<!-- sweet alert 2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.delete-item', function() {
    event.preventDefault();
    Swal.fire({
        title: "Are you sure to delete this?",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete",
    }).then((result) => {
    if (result.isConfirmed) {
        $(this).parent().submit();
    }
    });
    })
</script>
@if (session('message'))
    <script>
        toastr.success("{{ session('message') }}");
    </script>
@endif
@if (session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
@endif
@if (session('update'))
    <script>
        toastr.warning("{{ session('update') }}");
    </script>
@endif
