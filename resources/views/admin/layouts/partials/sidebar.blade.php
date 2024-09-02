<nav id="left-nav" class="left-nav">
    <a href="{{ asset('admin/dashboard') }}" class="logo-area">
        <img src="{{ asset('assets') }}/img/site-logo.png" alt="Site Logo" class="site-logo">
        <span class="site-name">Krust-Investments</span>
    </a>
    <ul class="nav-menu list-style-none scroll">
        <li>
            <a class="active" href="{{ route('admin.dashboard') }}">
                <span class="icon">
                    <img src="{{ asset('assets') }}/img/icon-menu-category.png">
                </span>
                <span class="name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.user.index') }}">
                <span class="icon">
                    <i class="fa-regular fa-circle-user"></i>
                </span>
                <span class="name">Manage Users</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.identyVerification.index') }}">
                <span class="icon">
                    <i class="fa-regular fa-credit-card"></i>
                </span>
                <span class="name">Identy Verification</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.deposit.index') }}">
                <span class="icon">
                    <i class="fa-regular fa-credit-card"></i>
                </span>
                <span class="name">Deposits</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.withdraw.index') }}">
                <span class="icon">
                    <i class="fa-solid fa-landmark"></i>
                </span>
                <span class="name">Withdrawals</span>
            </a>
        </li>
        <li>
            <a href="./trades.html">
                <span class="icon">
                    <i class="fa-solid fa-chart-line"></i>
                </span>
                <span class="name">Trades</span>
            </a>
        </li>
        <li>
            <a href="./assets.html">
                <span class="icon">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </span>
                <span class="name">Assets</span>
            </a>
        </li>
        <li>
            <a href="./software.html">
                <span class="icon">
                    <i class="fa-solid fa-server"></i>
                </span>
                <span class="name">Softwares</span>
            </a>
        </li>
        <li>
            <a href="./admin-settings.html">
                <span class="icon">
                    <i class="fa-solid fa-gear"></i>
                </span>
                <span class="name">Settings</span>
            </a>
        </li>
        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                <span class="icon">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </span>
                <span class="name">Log Out</span>
            </a>
        </li>
    </ul>
</nav>
