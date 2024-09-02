$(document).ready(function () {
    const url = window.location.href;
    const lastSegment = url.substring(url.lastIndexOf('/') + 1);
    const adminHead = `
<!-- nice select 2 -->
<link rel="stylesheet" href="../assets/nice-select-2/nice-select2.css">

<!-- style added here ================ -->
<link rel="stylesheet" href="../assets/css/admin-layout.css">
<link rel="stylesheet" href="../assets/css/admin-style.css">

<!-- font-awesome added here ================ -->
<link rel="stylesheet" href="../assets/font-awesome-6.6.6-web/css/all.min.css">

<!-- Data table added here ================ -->
<link rel="stylesheet" href="../assets/data-table-2.1.4/dataTables.dataTables.css" />
    `;
    const adminFoot = `
<!-- font-awesome added here ================ -->
<script src="../assets/font-awesome-6.6.6-web/js/all.min.js"></script>
<!-- nice select 2 -->
<script src="../assets/nice-select-2/nice-select2.js"></script>

<!-- apex charts js added here ======================= -->
<script type="text/javascript" src="../assets/apexcharts/apexcharts.js"></script>

<!-- Data table added here ================ -->
<script src="../assets/data-table-2.1.4/dataTables.js"></script>

<!-- upload file js add ======================= -->
<script src="../assets/upload-file/upload-file.js"></script>

<script src="../assets/js/admin-script.js"></script>
<script src="../assets/js/admin-layout.js"></script>


<!-- font added here (ital + Merriweather) ================ -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
    href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
    `;
    const headerAndNav = `
<nav id="left-nav" class="left-nav">
    <a href="../index.html" class="logo-area">
        <img src="../assets/img/site-logo.png" alt="Site Logo" class="site-logo">
        <span class="site-name">Krust-Investments</span>
    </a>
    <ul class="nav-menu list-style-none scroll">
        <li>
            <a class="active" href="./index.html">
                <span class="icon">
                    <img src="../assets/img/icon-menu-category.png">
                </span>
                <span class="name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="./user-manage.html">
                <span class="icon">
                    <i class="fa-regular fa-circle-user"></i>
                </span>
                <span class="name">Manage Users</span>
            </a>
        </li>
        <li>
            <a href="./all-users-deposit.html">
                <span class="icon">
                    <i class="fa-regular fa-credit-card"></i>
                </span>
                <span class="name">Deposits</span>
            </a>
        </li>
        <li>
            <a href="./all-users-withdraw.html">
                <span class="icon">
                    <i class="fa-solid fa-landmark"></i>
                </span>
                <span class="name">Withdrawals</span>
            </a>
        </li>
        <li>
            <a href="./all-trades.html">
                <span class="icon">
                    <i class="fa-solid fa-chart-line"></i>
                </span>
                <span class="name">Trades</span>
            </a>
        </li>
        <li>
            <a href="./all-assets.html">
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
            <a href="../login.html">
                <span class="icon">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </span>
                <span class="name">Log Out</span>
            </a>
        </li>
    </ul>
</nav>
<header class="top-header">
    <div class="container">
        <h1 class="page-title">Overview</h1>
        <a id="btn-nav-toggle" class="btn-nav-toggle">
            <i class="fa-solid fa-bars"></i>
        </a>

        <ul class="list-style-none d-flex align-items-center">
            <li class="dropdown">
                <a class="btn btn-notification">
                    <i class="fa-regular fa-bell"></i>
                </a>
                <ul class="dropdown-menu notifications d-flex flex-column">
                    <li class="dropdown-item head">
                        <strong>Notifications</strong>
                        <a><i class="fa-solid fa-check-double"></i> Mark All As Read </a>
                    </li>
                    <li class="dropdown-item notification-item">
                        <a>
                            <span class="text">New User Registration</span>
                            <span class="date">08-08-2024</span>
                            <span class="time">2:15 PM</span>
                        </a>
                    </li>
                    <li class="dropdown-item notification-item">
                        <a>
                            <span class="text">New User Registration</span>
                            <span class="date">08-08-2024</span>
                            <span class="time">2:15 PM</span>
                        </a>
                    </li>
                    <li class="dropdown-item notification-item">
                        <a>
                            <span class="text">Deposit Request by @MickyMichaelson</span>
                            <span class="date">08-08-2024</span>
                            <span class="time">2:15 PM</span>
                        </a>
                    </li>
                    <li class="dropdown-item foot">
                        <a href="./notification.html"><strong>All Notifications</strong></a>
                    </li>
                </ul>
            </li>
            <li class="dropdown w-max">
                <a class="btn btn-admin-dropdown">
                    <span class="icon">
                        <img src="../assets/img/site-logo.png">
                    </span>
                    <span>Admin</span>
                    <i class="fa-solid fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu d-flex flex-column">
                    <li class="dropdown-item">
                        <a href="./profile.html">
                            <span class="icon"><i class="fa-regular fa-circle-user"></i></span>
                            <span class="text">Profile</span>
                        </a>
                    </li>
                    <li class="dropdown-item">
                        <a href="./notification.html">
                            <span class="icon"><i class="fa-regular fa-bell"></i></span>
                            <span class="text">Notifications</span>
                        </a>
                    </li>
                    <li class="dropdown-item">
                        <a href="../index.html" target="_blank">
                            <span class="icon"><i class="fa-solid fa-globe"></i></span>
                            <span class="text">Go To Site</span>
                        </a>
                    </li>
                    <li class="dropdown-item">
                        <a href="../login.html">
                            <span class="icon">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

    </div>
</header>
    `;

    if ($('head.getHead').length) {
        $('head').append(adminHead);
        console.log('Head styles added'); //! ==================
    }

    if (!$('body > nav').length) {
        $('body').prepend(headerAndNav);
        console.log('admin header and left nav added'); //! ====
    }

    if (!$('body > footer').length) {
        $('body').append(adminFoot);
        console.log('admin footer script added'); //! ===========
    }

    $.each($('nav > .nav-menu > li'), function () {
        const href = $(this).find('a').attr('href');
        const parent = $('title').attr('parent');
        if (
            ('./' + lastSegment == href || `./${parent}.html` == href) &&
            !$(this).find('a').hasClass('active')
        ) {
            $(this).find('a').addClass('active');
            $(this).siblings().find('a').removeClass('active');
            console.log('left nav active');
            return;
        }
    }); //! ======================================================

    const siteTitle = $('title').text().slice(8); //!=============
    console.log(siteTitle);
    if (siteTitle) $('.top-header .page-title').text(siteTitle);
});
