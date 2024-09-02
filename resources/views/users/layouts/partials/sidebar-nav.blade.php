<nav id="left-nav" class="left-nav">
    <ul class="nav nav-tabs scroll">
        <li class="nav-item {{ Request::url() == route('user.dashboard') ? 'active' : '' }}">
            <a href="{{ route('user.dashboard') }}">
                <svg class="svg-inline--fa fa-circle-user" aria-hidden="true" focusable="false" data-prefix="far"
                    data-icon="circle-user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M406.5 399.6C387.4 352.9 341.5 320 288 320l-64 0c-53.5 0-99.4 32.9-118.5 79.6C69.9 362.2 48 311.7 48 256C48 141.1 141.1 48 256 48s208 93.1 208 208c0 55.7-21.9 106.2-57.5 143.6zm-40.1 32.7C334.4 452.4 296.6 464 256 464s-78.4-11.6-110.5-31.7c7.3-36.7 39.7-64.3 78.5-64.3l64 0c38.8 0 71.2 27.6 78.5 64.3zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-272a40 40 0 1 1 0-80 40 40 0 1 1 0 80zm-88-40a88 88 0 1 0 176 0 88 88 0 1 0 -176 0z">
                    </path>
                </svg><!-- <i class="fa-regular fa-circle-user"></i> Font Awesome fontawesome.com -->
                <span>Account</span>
            </a>
        </li>
        <li class="nav-item {{ Request::url() == route('user.deposit.getway') ? 'active' : '' }}">
            <a href="{{ route('user.deposit.getway') }}">
                <svg class="svg-inline--fa fa-credit-card" aria-hidden="true" focusable="false" data-prefix="far"
                    data-icon="credit-card" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z">
                    </path>
                </svg><!-- <i class="fa-regular fa-credit-card"></i> Font Awesome fontawesome.com -->
                <span>Deposits</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#">
                <svg class="svg-inline--fa fa-clock-rotate-left" aria-hidden="true" focusable="false"
                    data-prefix="fas" data-icon="clock-rotate-left" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M75 75L41 41C25.9 25.9 0 36.6 0 57.9L0 168c0 13.3 10.7 24 24 24l110.1 0c21.4 0 32.1-25.9 17-41l-30.8-30.8C155 85.5 203 64 256 64c106 0 192 86 192 192s-86 192-192 192c-40.8 0-78.6-12.7-109.7-34.4c-14.5-10.1-34.4-6.6-44.6 7.9s-6.6 34.4 7.9 44.6C151.2 495 201.7 512 256 512c141.4 0 256-114.6 256-256S397.4 0 256 0C185.3 0 121.3 28.7 75 75zm181 53c-13.3 0-24 10.7-24 24l0 104c0 6.4 2.5 12.5 7 17l72 72c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-65-65 0-94.1c0-13.3-10.7-24-24-24z">
                    </path>
                </svg><!-- <i class="fa-solid fa-clock-rotate-left"></i> Font Awesome fontawesome.com -->
                <span>Trading History</span>
            </a>
        </li>
        <li class="nav-item {{ Request::url() == route('user.marketWatch.index') ? 'active' : '' }}">
            <a href="{{ route('user.marketWatch.index') }}">
                <svg class="svg-inline--fa fa-list-ul" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="list-ul" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z">
                    </path>
                </svg><!-- <i class="fa-solid fa-list-ul"></i> Font Awesome fontawesome.com -->
                <span>Market Watch</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#">
                <svg class="svg-inline--fa fa-graduation-cap" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="graduation-cap" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 640 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M320 32c-8.1 0-16.1 1.4-23.7 4.1L15.8 137.4C6.3 140.9 0 149.9 0 160s6.3 19.1 15.8 22.6l57.9 20.9C57.3 229.3 48 259.8 48 291.9l0 28.1c0 28.4-10.8 57.7-22.3 80.8c-6.5 13-13.9 25.8-22.5 37.6C0 442.7-.9 448.3 .9 453.4s6 8.9 11.2 10.2l64 16c4.2 1.1 8.7 .3 12.4-2s6.3-6.1 7.1-10.4c8.6-42.8 4.3-81.2-2.1-108.7C90.3 344.3 86 329.8 80 316.5l0-24.6c0-30.2 10.2-58.7 27.9-81.5c12.9-15.5 29.6-28 49.2-35.7l157-61.7c8.2-3.2 17.5 .8 20.7 9s-.8 17.5-9 20.7l-157 61.7c-12.4 4.9-23.3 12.4-32.2 21.6l159.6 57.6c7.6 2.7 15.6 4.1 23.7 4.1s16.1-1.4 23.7-4.1L624.2 182.6c9.5-3.4 15.8-12.5 15.8-22.6s-6.3-19.1-15.8-22.6L343.7 36.1C336.1 33.4 328.1 32 320 32zM128 408c0 35.3 86 72 192 72s192-36.7 192-72L496.7 262.6 354.5 314c-11.1 4-22.8 6-34.5 6s-23.5-2-34.5-6L143.3 262.6 128 408z">
                    </path>
                </svg><!-- <i class="fa-solid fa-graduation-cap"></i> Font Awesome fontawesome.com -->
                <span>Education</span>
            </a>
        </li>
        <li class="nav-item {{ Request::url() == route('user.market.news') ? 'active' : '' }}">
            <a href="{{ route('user.market.news') }}">
                <svg class="svg-inline--fa fa-bullhorn" aria-hidden="true" focusable="false" data-prefix="fas"
                    data-icon="bullhorn" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                    data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M480 32c0-12.9-7.8-24.6-19.8-29.6s-25.7-2.2-34.9 6.9L381.7 53c-48 48-113.1 75-181 75l-8.7 0-32 0-96 0c-35.3 0-64 28.7-64 64l0 96c0 35.3 28.7 64 64 64l0 128c0 17.7 14.3 32 32 32l64 0c17.7 0 32-14.3 32-32l0-128 8.7 0c67.9 0 133 27 181 75l43.6 43.6c9.2 9.2 22.9 11.9 34.9 6.9s19.8-16.6 19.8-29.6l0-147.6c18.6-8.8 32-32.5 32-60.4s-13.4-51.6-32-60.4L480 32zm-64 76.7L416 240l0 131.3C357.2 317.8 280.5 288 200.7 288l-8.7 0 0-96 8.7 0c79.8 0 156.5-29.8 215.3-83.3z">
                    </path>
                </svg><!-- <i class="fa-solid fa-bullhorn"></i> Font Awesome fontawesome.com -->
                <span>Market News</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg class="svg-inline--fa fa-arrow-right-from-bracket" aria-hidden="true" focusable="false"
                    data-prefix="fas" data-icon="arrow-right-from-bracket" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor"
                        d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z">
                    </path>
                </svg><!-- <i class="fa-solid fa-arrow-right-from-bracket"></i> Font Awesome fontawesome.com -->
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
