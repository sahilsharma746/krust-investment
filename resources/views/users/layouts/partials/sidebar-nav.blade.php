<nav id="left-nav" class="left-nav">
    <ul class="nav nav-tabs scroll">
        <li class="nav-item {{ Request::is('user/dashboard') ? 'active' : '' }}">
            <a href="{{ route('user.dashboard') }}" onclick="localStorage.removeItem('activeLeftTab');">
                @if(isset($user_data) && !empty($user_data->avatar))
                    <img src="{{ asset('uploads/user_avatar/' . $user_data->avatar) }}" style="width: 50px; height: 50px; border-radius: 50%;">
                @else
                    <i class="fa-regular fa-circle-user" style="font-size: 10px;"></i>
                @endif
                <span>{{ session('user_name') }}</span>
            </a>
        </li>
        
        
        <li class="nav-item {{ Request::url() == route('user.deposit.getway') ? 'active' : '' }}">
            <a href="{{ route('user.deposit.getway') }}">
                <i class="fa-regular fa-credit-card"></i>
                <span>Deposits</span>
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" href="javascript:void(0)">
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Trading History</span>
            </a>
        </li>
        <li class="nav-item {{ Request::url() == route('user.marketWatch.index') ? 'active' : '' }}">
            <a href="{{ route('user.marketWatch.index') }}">
                <i class="fa-solid fa-list-ul"></i>
                <span>Market Watch</span>
            </a>
        </li>
        <li class="nav-item {{ Request::url() == route('user.trade.index') ? 'active' : '' }}">
            <a href="{{ route('user.trade.index') }}">
                <i class="fa-solid fa-arrow-down-up-across-line"></i>
                <span>Trade</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="javascript:void(0)">
                <i class="fa-solid fa-graduation-cap"></i>
                <span>Education</span>
            </a>
        </li>
        <li class="nav-item {{ Request::url() == route('user.market.news') ? 'active' : '' }}">
            <a href="{{ route('user.market.news') }}">
                <i class="fa-solid fa-bullhorn"></i>
                <span>Market News</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>

