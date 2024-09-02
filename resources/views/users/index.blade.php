@extends('users.layouts.app_user')
@section('content')
    <article class="tab-content trade-article">
        <div id="admin-account-grid" class="tab-pane in active admin-account-grid d-grid">
            <div class="balance-board d-grid align-items-center">
                <div class="btn-area d-grid g-25">
                    <a class="btn btn-deposit g-8" href="{{ route('user.deposit.getway') }}">
                        <i class="fa-regular fa-credit-card"></i>
                        <span>Deposit</span>
                    </a>
                    <a class="btn btn-withdraw g-8" href="{{ route('user.withdraw.index') }}">
                        <i class="fa-solid fa-landmark"></i>
                        <span>Withdraw</span>
                    </a>
                </div>
                <div class="card-group d-grid w-100 align-items-start">
                    <div class="card d-grid g-4">
                        <div class="card-title">Total balance</div>
                        <div class="card-price d-flex align-items-center g-8">
                            <img src="{{ asset('assets') }}/img/flag-eur.png" alt="Eur currency">
                            <div class="amount">${{ auth()->user()->balance }}</div>
                        </div>
                        <div class="card-status d-flex align-items-center g-3 text-primary">
                            <div class="percentage">1.5%</div>
                            <span class="status up">
                                <i class="fa-solid fa-arrow-up"></i>
                            </span>
                        </div>
                    </div>
                    <div class="card d-grid g-4">
                        <div class="card-title">Total Deposit</div>
                        <div class="card-price d-flex align-items-center g-8">
                            <img src="{{ asset('assets') }}/img/flag-eur.png" alt="Eur currency">
                            <div class="amount">${{ $totalDeposit }}</div>
                        </div>
                    </div>
                    <div class="card d-grid g-4">
                        <div class="card-title">Profitable Trades</div>
                        <div class="card-price d-flex align-items-center g-8">
                            <img src="{{ asset('assets') }}/img/flag-eur.png" alt="Eur currency">
                            <div class="amount">0/0</div>
                        </div>
                        <div class="card-status d-flex align-items-center g-4 text-danger-2">
                            <div class="percentage">0.0%</div>
                            <span class="status up">
                                <i class="fa-solid fa-arrow-down"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="company-trade-percentage-card-group d-grid">
                <div class="card d-grid align-items-center">
                    <img src="{{ asset('assets') }}/img/company-bitcoin_symbol.svg.png" alt="company logo">
                    <div class="card-title-area">
                        <div class="card-title">Bitcoin</div>
                        <div class="card-price">
                            <span>USD</span>
                            <span class="amount">64,000</span>
                        </div>
                    </div>
                    <div class="card-status d-flex align-items-center g-4 text-primary">
                        <div class="percentage">1.5%</div>
                        <span class="status">
                            <i class="fa-solid fa-arrow-up"></i>
                        </span>
                    </div>
                </div>
                <div class="card d-grid align-items-center">
                    <img src="{{ asset('assets') }}/img/company-apple-T.png" alt="company logo">
                    <div class="card-title-area">
                        <div class="card-title">Bitcoin</div>
                        <div class="card-price">
                            <span>USD</span>
                            <span class="amount">64,000</span>
                        </div>
                    </div>
                    <div class="card-status d-flex align-items-center g-4 text-danger">
                        <div class="percentage">0.5%</div>
                        <span class="status">
                            <i class="fa-solid fa-arrow-down"></i>
                        </span>
                    </div>
                </div>
                <div class="card d-grid align-items-center">
                    <img src="{{ asset('assets') }}/img/company-amazon.png" alt="company logo">
                    <div class="card-title-area">
                        <div class="card-title">Amazon</div>
                        <div class="card-price">
                            <span>USD</span>
                            <span class="amount">64,000</span>
                        </div>
                    </div>
                    <div class="card-status d-flex align-items-center g-4 text-primary">
                        <div class="percentage">1.5%</div>
                        <span class="status">
                            <i class="fa-solid fa-arrow-up"></i>
                        </span>
                    </div>
                </div>
                <div class="card d-grid align-items-center">
                    <img src="{{ asset('assets') }}/img/company-solana_symbol.svg.png" alt="company logo">
                    <div class="card-title-area">
                        <div class="card-title">Bitcoin</div>
                        <div class="card-price">
                            <span>USD</span>
                            <span class="amount">64,000</span>
                        </div>
                    </div>
                    <div class="card-status d-flex align-items-center g-4 text-danger">
                        <div class="percentage">0.5%</div>
                        <span class="status">
                            <i class="fa-solid fa-arrow-down"></i>
                        </span>
                    </div>
                </div>
            </div>


            <ul class="navigation-card-group list-style-none d-grid">
                <li>
                    <a class="card d-grid align-items-center g-8" href="{{ route('user.personal.info') }}">
                        <div class="icon">
                            <i class="fa-regular fa-circle-user"></i>
                        </div>
                        <p>Personal information</p>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </li>
                <li>
                    <a class="card d-grid align-items-center g-8" href="{{ route('user.profile.verification') }}">
                        <div class="icon">
                            <i class="fa-solid fa-fingerprint"></i>
                        </div>
                        <p>Verification</p>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </li>
                <li>
                    <a class="card d-grid align-items-center g-8" href="{{ route('user.profile.securitySetting') }}">
                        <div class="icon">
                            <i class="fa-solid fa-gear"></i>
                            <!-- <img src="{{ asset('assets') }}/img/Icon-gear.png" alt="settings icon"> -->
                        </div>
                        <p>Security settings</p>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </li>
                <li>
                    <a class="card d-grid align-items-center g-8" href="{{ route('user.marketWatch.index') }}">
                        <div class="icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <p>Trade</p>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </li>
                <li>
                    <a class="card d-grid align-items-center g-8" href="">
                        <div class="icon">
                            <i class="fa-brands fa-rocketchat"></i>
                            <!-- <img src="{{ asset('assets') }}/img/Icon-chat.png" alt=""> -->
                        </div>
                        <p>Live Chat</p>
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </li>
            </ul>


        </div>

        <div id="market-watch-grid" class="tab-pane in market-watch-grid d-grid">
            <div class="card trade-status-card">
                <div class="card-header">
                    <a href="" class="btn-tab">Market Watch</a>
                    <a href="" class="btn-tab active">Tradable Assets</a>
                </div>
                <div class="card-body">
                    <div class="card-indicators scroll">
                        <a href="" class="btn-tab active">Forex</a>
                        <a href="" class="btn-tab">Crypto</a>
                        <a href="" class="btn-tab">Indices</a>
                        <a href="" class="btn-tab">Test</a>
                    </div>
                    <div class="trade-update-table-area">
                        <div class="input-group">
                            <input id="searchTradeAssets" class="form-control search-input" type="text"
                                placeholder="Search for assets etc...">
                            <label for="searchTradeAssets" class="search-icon"><i
                                    class="fa-solid fa-magnifying-glass"></i></label>
                        </div>
                        <dl class="trade-update-table scroll">
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag"
                                        class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="card krust-investments-tradingView-card" id="krust-investments-tradingview-card">
            </div>
        </div>
    </article>
@endsection
