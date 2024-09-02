<script src="{{ asset('assets') }}/font-awesome-6.6.6-web/js/all.min.js"></script>

@yield('scripts')

<!-- script added here ======================= -->
<script src="{{ asset('assets') }}/js/site-common.js"></script>
<script src="{{ asset('assets') }}/js/script.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('status'))
    <script>
        swal("Good job!", "You clicked the button!", "success");
    </script>
@endif
