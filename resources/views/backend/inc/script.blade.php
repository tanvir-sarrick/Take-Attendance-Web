    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('backend/libs/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('backend/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/sparkline/sparkline.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset('backend/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset('backend/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('backend/js/custom.min.js') }}"></script>
    <!--This page JavaScript -->
     <!-- <script src="{{ asset('backend/js/pages/dashboards/dashboard1.js') }}"></script> -->
    <!-- Charts js Files -->
    <script src="{{ asset('backend/libs/flot/excanvas.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('backend/libs/flot/jquery.flot.crosshair.js') }}"></script>
    <script src="{{ asset('backend/libs/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('backend/js/pages/chart/chart-page-init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    <!-- <script src="{{ asset('backend/libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('backend/libs/select2/dist/js/select2.min.js') }}"></script> -->
    <!-- this page js -->
    <script src="{{ asset('backend/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
    <script src="{{ asset('backend/extra-libs/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
    
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
    </script>
    <script>
        @if(Session::has('message'))
        toastr.options.closeButton = true;
        var type = "{{ Session::get('alert-type','info') }}"
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            // case 'warning':
            // toastr.warning(" {{ Session::get('message') }} ");
            // break;

            case 'danger':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
        
            /*datwpicker*/
            jQuery(".mydatepicker").datepicker();
            jQuery("#datepicker-autoclose").datepicker({
                autoclose: true,
                todayHighlight: true,
            });
            var quill = new Quill("#editor", {
                theme: "snow",
            });
    </script>
