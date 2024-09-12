@extends('users.layouts.app_user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/user-dashboard.css">
@endsection
@section('content')
    <style>
        .flag-container {
            position: relative;
            width: 150px;
            /* Container width can be adjusted */
            height: 150px;
            /* Container height can be adjusted */
        }

        .flag {
            position: absolute;
            width: 20px;
            height: 20px;
            border-radius: 50%;
        }

        .flag1 {
            top: px;
            left: 0;
            z-index: 1;
            /* This flag will be behind the second one */
        }

        .flag2 {
            top: 10px;
            /* Slightly moved down to create the overlapping effect */
            left: 8px;
            /* Slightly moved right to create the overlapping effect */
            z-index: 2;
            /* This flag will be on top of the first one */
        }
    </style>

    <article class="tab-content trade-article">
        <section id="market-watch-grid" class="tab-pane in active market-watch-grid d-grid ">
            <div class="card trade-status-card">
                <div class="card-header">
                    <a href="{{ route('user.marketWatch.index') }}" class="btn-tab ">Market Watch</a>
                    <a href="{{ route('user.trade.index') }}" class="btn-tab">Tradable Assets</a>
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
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/GB--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDJPY</span>
                                </div>
                                <div class="price">142.354</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">


                                        <img class="flag flag2" src="{{ asset('assets') }}/img/JP--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>eurusd</span>
                                </div>
                                <div class="price">71.09</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/CH--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDCNY</span>
                                </div>
                                <div class="price">189.03</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/HU--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDSGD</span>
                                </div>
                                <div class="price">189.53</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/RU--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>EURJPY</span>
                                </div>
                                <div class="price">34.87</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/JP--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            lt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDKRW</span>
                                </div>
                                <div class="price">167.789</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDKRW</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>

                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/EU--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>AUDJPY</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/CH--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDCNY</span>
                                </div>
                                <div class="price">189.03</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/HU--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDSGD</span>
                                </div>
                                <div class="price">189.53</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/RU--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>EURJPY</span>
                                </div>
                                <div class="price">34.87</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/JP--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            lt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDKRW</span>
                                </div>
                                <div class="price">167.789</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>USDKRW</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>

                            <dt class="d-flex justify-content-between align-items-center g-10">
                                <div class="country-name d-flex align-items-center g-8">
                                    <div class="flag-container"
                                        style="position: relative; width: 30px; height: 30px; margin-right: 8px;">
                                        <img class="flag flag1" src="{{ asset('assets') }}/img/EU--big.svg"
                                            alt="Switzerland Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 0; left: 0;">
                                        <img class="flag flag2" src="{{ asset('assets') }}/img/US--big.svg"
                                            alt="Canada Flag"
                                            style="position: absolute; width: 20px; height: 20px; top: 10px; left: 8px;">
                                    </div>
                                    <span>AUDJPY</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
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
                                <label class="form-label">Margin</label>
                                <select class="form-control small" id="marketViewChartFrame">
                                    <option value="0">Select Margin</option>
                                    <option value="">1x</option>
                                    <option value="">2x</option>
                                    <option value="">5x</option>
                                    <option value="">10x</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label class="form-label">Units</label>
                                <input class="form-control" type="text" placeholder="Enter units">
                            </div>
                            <div class="input-group">
                                <label class="form-label">Amount</label>
                                <input class="form-control" type="number" min="0" placeholder="Enter Amount">
                            </div>
                            <div class="input-group">
                                <label class="form-label">Time Frame</label>
                                <select class="form-control small" id="marketViewChartTimeFrame">
                                    <option value="0">Select Time Frame</option>
                                    <option value="">5 Minutes</option>
                                    <option value="">30 Minutes</option>
                                    <option value="">1 hours</option>
                                    <option value="">4 Hours</option>
                                    <option value="">1 day</option>
                                    <option value="">1 Week</option>
                                    <option value="">1 Month</option>
                                    <option value="">1 Year</option>
                                </select>
                            </div>
                            <table class="user-trade-short-history w-100">
                                <tbody>
                                    <tr>
                                        <td>Contract Size</td>
                                        <td>-</td>
                                        <td class="text-end">1M</td>
                                    </tr>
                                    <tr>
                                        <td>Volatility</td>
                                        <td>-</td>
                                        <td class="text-end">High</td>
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
