<!-- font-awesome added here ================ -->
<script src="{{ asset('assets') }}/font-awesome-6.6.6-web/js/all.min.js"></script>
<!-- nice select 2 -->
<script src="{{ asset('assets') }}/nice-select-2/nice-select2.js"></script>

@yield('scripts')

<!-- <script src="{{ asset('assets') }}/js/admin.js"></script> -->


@if (Route::currentRouteName() === 'user.dashboard')
    <script src="{{ asset('assets') }}/upload-file/upload-file.js"></script>
@endif

    <script src="{{ asset('assets') }}/js/user-dashboard.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('success'))
        <script>swal("Good job!", "{{ session('success') }}", "success");</script>
    @endif

    @if (session('error'))
        <script>swal("Opps!", "{{ session('error') }}", "error");</script>
    @endif
</body>
</html>
