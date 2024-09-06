@extends('users.layouts.app_user')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets') }}/css/user-dashboard.css">
@endsection
@section('content')
    <article class="tab-content trade-article">
        <section id="market-watch-grid" class="tab-pane in active market-watch-grid d-grid ">
            <div class="card trade-status-card">
                <div class="card-header">
                    <a href="" class="btn-tab active">Market Watch</a>
                    <a href="" class="btn-tab">Tradable Assets</a>
                </div>
                <div class="card-body">
                    <div class="card-indicators scroll">
                        <a href="" class="btn-pill active">Forex</a>
                        <a href="" class="btn-pill">Crypto</a>
                        <a href="" class="btn-pill">Indices</a>
                        <a href="" class="btn-pill">Test</a>
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
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span>eurusd</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                        </dl>
                    </div>
                </div>
            </div>

            <div class="market-watch-chart-area d-grid scroll">
                <div class="market-watch-chart-parent">
                    <div id="market-watch-chart" class="market-watch-chart">
                    </div>
                </div>
                <!-- <div class="card krust-investments-tradingView-card" id="krust-investments-tradingView-card">
                    </div> -->
                <div class="market-watch-chart-filter scroll">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex g-8">
                                <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                <div class="d-grid">
                                    <span class="name">eurusd</span>
                                    <span class="details">Euro / U.S Dollar</span>
                                </div>
                            </div>

                            <div class="icon">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </div>
                        <div class="card-body d-grid g-10">
                            <div class="input-group">
                                <label class="form-label">Amount</label>
                                <input class="form-control" type="number" min="0" placeholder="Enter Amount">
                            </div>
                            <div class="input-group">
                                <label class="form-label">Time Frame</label>
                                <select class="form-control small" id="marketViewChartTimeFrame">
                                    <option value="0">Select Time Frame</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label class="form-label">Margin</label>
                                <select class="form-control small" id="marketViewChartFrame">
                                    <option value="0">Select Margin</option>
                                    <option value="">5x</option>
                                    <option value="">10x</option>
                                    <option value="">15x</option>
                                </select>
                            </div>
                            <table class="market-watch-short-history w-100">
                                <tbody>
                                    <tr>
                                        <td>Strike Rate</td>
                                        <td>-</td>
                                        <td class="text-end">70%</td>
                                    </tr>
                                    <tr>
                                        <td>Contract Size</td>
                                        <td>-</td>
                                        <td class="text-end">1M</td>
                                    </tr>
                                    <tr>
                                        <td>Leverage</td>
                                        <td>-</td>
                                        <td class="text-end">1:50</td>
                                    </tr>
                                    <tr>
                                        <td>Fees</td>
                                        <td>-</td>
                                        <td class="text-end">$0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <div class="btn-area d-flex g-10">
                                <a href="" class="btn d-grid btn-buy">
                                    <span class="name">buy</span>
                                    <span>1.5647</span>
                                </a>
                                <a href="" class="btn d-grid btn-sell">
                                    <span class="name">Sell</span>
                                    <span>1.5402</span>
                                </a>
                            </div>

                            <div class="payout-area d-grid">
                                <span>Your Payout</span>
                                <span class="text-center">=</span>
                                <span class="text-end">$320.45</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="market-details-summery-card-group d-flex justify-content-between">
                    <div class="last-closed-trades">
                        <p>Last Closed Trades</p>
                        <div class="d-flex">
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">ASSETS</div>
                                <div class="value">EUR/USD</div>
                            </div>
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">TIMEFRAME</div>
                                <div class="value">10 Hrs</div>
                            </div>
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">Capital</div>
                                <div class="value">$100k</div>
                            </div>
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">Profit</div>
                                <div class="value">+ $1,000</div>
                            </div>
                        </div>
                    </div>
                    <div class="last-open-trades">
                        <p class="text-end">Last Open Trades</p>
                        <div class="d-flex">
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">ASSETS</div>
                                <div class="value">EUR/USD</div>
                            </div>
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">TIMEFRAME</div>
                                <div class="value">10 Hrs</div>
                            </div>
                            <div class="card d-flex flex-column justify-content-center">
                                <div class="key">CURRENT TIME</div>
                                <div id="currentTime" interval="true" class="value">1:42 PM</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ asset('assets') }}/apexcharts/apexcharts.js"></script>
<script src="{{ asset('assets') }}/js/user-dashboard.js"></script>
@endsection
