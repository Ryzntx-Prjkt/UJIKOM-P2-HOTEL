<script src="{{ asset('/assets/js/core/popper.min.js')}}"></script>
<script src="{{ asset('/assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
<script src="{{ asset('/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>

<script src="{{ asset('plugins/axios/axios.min.js')}}"></script>

{{-- <script src="{{ asset('plugins/summernote/dist/summernote.min.js')}}"></script> --}}
<script src="{{ asset('plugins/summernote/dist/summernote-bs5.min.js')}}"></script>

<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('plugins/izitoast/js/iziToast.js')}}"></script>
<script src="{{ asset('plugins/select2/dist/js/select2.js')}}"></script>
<script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>

<script type="text/javascript" src="{{asset('plugins/datatables/JSZip-2.5.0/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/DataTables-1.11.5/js/jquery.dataTables.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/DataTables-1.11.5/js/dataTables.bootstrap5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/buttons.bootstrap5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Buttons-2.2.2/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/DateTime-1.1.2/js/dataTables.dateTime.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Responsive-2.2.9/js/dataTables.responsive.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Responsive-2.2.9/js/responsive.bootstrap5.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/Scroller-2.0.5/js/dataTables.scroller.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchBuilder-1.3.2/js/dataTables.searchBuilder.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchBuilder-1.3.2/js/searchBuilder.bootstrap5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchPanes-2.0.0/js/dataTables.searchPanes.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/datatables/SearchPanes-2.0.0/js/searchPanes.bootstrap5.min.js')}}"></script>

<script>

    $(document).ready(function() {
        $('.select2').select2();
    });

    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    };

</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('/assets/js/argon-dashboard.min.js')}}?v=2.0.0"></script>
