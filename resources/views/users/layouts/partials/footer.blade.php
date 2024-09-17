    <script src="{{ asset('assets') }}/nice-select-2/nice-select2.js"></script>

    <script src="{{ asset('assets') }}/js/site-common.js"></script>

    <!-- <script src="{{ asset('assets') }}/js/admin.js"></script> -->

    @if (Route::currentRouteName() === 'user.dashboard')
        <script src="{{ asset('assets') }}/upload-file/upload-file.js"></script>
    @endif

    @if (Route::currentRouteName() === 'user.trade.index' || Route::currentRouteName() === 'user.marketWatch.index')
        <script src="{{ asset('assets') }}/apexcharts/apexcharts.js"></script>
        <script src="{{ asset('assets') }}/js/user-trade.js"></script>
    @endif
    <script src="{{ asset('assets') }}/js/user-script.js"></script>

    <script src="{{ asset('assets') }}/font-awesome-6.6.6-web/js/all.min.js"></script>
    <script src="{{ asset('assets') }}/js/user-dashboard.js"></script>
    <script src="{{ asset('assets') }}/font-awesome-6.6.6-web/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    @if (session('success'))
        <script> swal("Good job!", "{{ session('success') }}", "success") ;</script>
    @endif

    @if (session('withdrawl_success'))
        <script> swal("Good job!", "{{ session('withdrawl_success') }}", "success") ;</script>
    @endif

    @if (session('error'))
        <script>swal("Opps!", "{{ session('error') }}", "error");</script>
    @endif
</body>
</html>
