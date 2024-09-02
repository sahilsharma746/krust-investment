


<!-- font-awesome added here ================ -->
<script src="{{ asset('assets') }}/font-awesome-6.6.6-web/js/all.min.js"></script>
<!-- nice select 2 -->
<script src="{{ asset('assets') }}/nice-select-2/nice-select2.js"></script>




@yield('scripts')

<!-- script added here ======================= -->
<script src="{{ asset('assets') }}/js/site-common.js"></script>
<script src="{{ asset('assets') }}/js/admin.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('success'))
    <script>swal("Good job!", "{{ session('success') }}", "success");</script>
@endif

@if (session('error'))
    <script>swal("Opps!", "{{ session('error') }}", "error");</script>
@endif

</body>

</html>
