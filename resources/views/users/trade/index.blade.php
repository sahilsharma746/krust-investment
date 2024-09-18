@extends('users.layouts.app_user')
@section('content')
    <article class="tab-content trade-article">
        <section id="trade-and-market-common-grid" class="trade-and-market-common-grid d-grid">
            <div class="card trade-and-market-common-card">
                <div class="card-header">
                    <a href="{{ route('user.trade.index') }}" class="btn-tab active">Tradable Assets</a>
                    <a href="{{ route('user.marketWatch.index') }}" class="btn-tab ">Market Watch</a>
                </div>
                <div class="card-body">
                    <div class="card-indicators scroll">
                        <a data-label="FX:EURUSD" class="btn-pill trade-type btn-forex active">Forex</a>
                        <a data-label="BITSTAMP:BTCUSD" class="btn-pill trade-type btn-crypto">Crypto</a>
                        <a data-label="TVC:DXY" class="btn-pill trade-type btn-indices">Indices</a>
                    </div>
                    <div class="trade-and-market-common-table-area">
                        <div class="input-group search-input-group">
                            <input id="searchTableAssets" class="form-control search-input" type="search"
                                placeholder="Search for assets etc...">
                            <label for="searchTableAssets" class="search-icon"><i
                                    class="fa-solid fa-magnifying-glass"></i></label>
                        </div>
                        <dl id="trade-and-market-common-table" class="trade-and-market-common-table scroll">
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/US--big.svg" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="EURUSD"
                                        data-fullname="EURO / U.S. DOLLAR">EURUSD</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="GBPUSD"
                                        data-fullname="BRITISH POUND / U.S. DOLLAR">GBPUSD</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="EURUAH"
                                        data-fullname="EURO / UKRAINIAN HRYVNIA">EURUAH</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="USDSIT"
                                        data-fullname="U.S. DOLLAR / SLOVENIAN TOLAR">USDSIT</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="GBPUAH"
                                        data-fullname="BRITISH POUND / UKRAINIAN HRYVNIA">GBPUAH</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-success">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="CHFUAH"
                                        data-fullname="SWISS FRANC / UKRAINIAN HRYVNIA">CHFUAH</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                            <dt class="d-flex justify-content-between align-items-center g-10 asset-data    ">
                                <div class="country-name d-flex align-items-center g-8">
                                    <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                    <span data-price="1.0953" data-name="USDSIT"
                                        data-fullname="U.S. DOLLAR / SLOVENIAN TOLAR">USDSIT</span>
                                </div>
                                <div class="price">1.0953</div>
                                <div class="percentage text-danger">+0.77%</div>
                            </dt>
                        </dl>
                    </div>
                </div>
            </div>

            <div id="user-trade-chart-area" class="user-trade-chart-area d-grid scroll">
                <div class="market-watch-chart-parent">
                    <div id="market-watch-chart" class="market-watch-chart">
                    </div>
                </div>
                <div class="user-trade-chart-filter scroll">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="d-flex g-8 selected-asset">
                                <img src="{{ asset('assets') }}/img/country-eur.png" alt="country flag" class="flag">
                                <div class="d-grid">
                                    <span class="name">eurusd</span>
                                    <span class="details fullname">Euro / U.S Dollar</span>
                                    <input type="hidden" name="price" value="" class="asset-unitprice">
                                </div>
                            </div>

                            <div class="icon">
                                <i class="fa-solid fa-chevron-right"></i>
                            </div>
                        </div>
                        <div class="card-body d-grid g-10">
                            <div class="input-group">
                                <label class="form-label">Margin</label>
                                <select class="form-control small asset-margin" id="marketViewChartFrame">
                                    <option value="1">1x</option>
                                    <option value="2">2x</option>
                                    <option value="5">5x</option>
                                    <option value="10">10x</option>
                                </select>
                            </div>
                            <div class="input-group">
                                <label class="form-label">Units</label>
                                <input class="form-control asset-unit-price" readonly type="text" placeholder="Enter units">
                            </div>
                            <div class="input-group">
                                <label class="form-label">Amount</label>
                                <input class="form-control asset-trade-amount" type="number" min="0"
                                    placeholder="Enter Amount">
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
                                        <td class="text-end">$<span class="asset-contract-size">0</span></td>
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
                                <span class="text-end text-primary">$<span class="asset-payout">0</span></span>
                                <input type="hidden" value="{{$user_balance}}" class="asset-user_balance">
                                <input type="hidden" value="{{$trade_result_percentage}}" class="asset-trade_result_percentage">
                                <input type="hidden" value="{{$trade_result}}" class="asset-trade_result">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="trade-details-summery">
                        <div class="card">
                            <div class="card-header d-flex g-25">
                                <a class="active" data-toggle="tab" href="#trade-details-summery-current">Current
                                    Trade</a>
                                <a data-toggle="tab" href="#trade-details-summery-history">Trade History</a>
                            </div>
                            <div class="card-body scroll">
                                <table id="trade-details-summery-current">
                                    <thead>
                                        <tr>
                                            <th>ASSETS</th>
                                            <th>MARGIN</th>
                                            <th>SIZE</th>
                                            <th>CAPITAL</th>
                                            <th>TRADE TYPE</th>
                                            <th>ENTRY</th>
                                            <th>PNL</th>
                                            <th>DATE CREATED</th>
                                            <th>TIME CREATED</th>
                                            <th>ORDER TYPE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EUR/USD</td>
                                            <td>4x</td>
                                            <td>5,000</td>
                                            <td>$1000</td>
                                            <td>LIVE</td>
                                            <td>1.07</td>
                                            <td>+1000</td>
                                            <td>07 - 08 - 2024</td>
                                            <td>11.11AM</td>
                                            <td>Bullish</td>
                                        </tr>
                                        <tr>
                                            <td>EUR/USD</td>
                                            <td>4x</td>
                                            <td>5,000</td>
                                            <td>$1000</td>
                                            <td>Demo</td>
                                            <td>1.07</td>
                                            <td>+1000</td>
                                            <td>07 - 08 - 2024</td>
                                            <td>11.11AM</td>
                                            <td>Bullish</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="trade-details-summery-history" class="d-none">
                                    <thead>
                                        <tr>
                                            <th>ASSETS</th>
                                            <th>MARGIN</th>
                                            <th>SIZE</th>
                                            <th>CAPITAL</th>
                                            <th>TRADE TYPE</th>
                                            <th>ENTRY</th>
                                            <th>PNL</th>
                                            <th>DATE CREATED</th>
                                            <th>TIME CREATED</th>
                                            <th>ORDER TYPE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>EUR/USD</td>
                                            <td>1x</td>
                                            <td>2,000</td>
                                            <td>$500</td>
                                            <td>Demo</td>
                                            <td>1.07</td>
                                            <td>+500</td>
                                            <td>06 - 08 - 2024</td>
                                            <td>11.11AM</td>
                                            <td>Bullish</td>
                                        </tr>
                                        <tr>
                                            <td>EUR/USD</td>
                                            <td>4x</td>
                                            <td>5,000</td>
                                            <td>$1000</td>
                                            <td>LIVE</td>
                                            <td>1.07</td>
                                            <td>+1000</td>
                                            <td>07 - 08 - 2024</td>
                                            <td>11.11AM</td>
                                            <td>Bullish</td>
                                        </tr>
                                        <tr>
                                            <td>EUR/USD</td>
                                            <td>4x</td>
                                            <td>5,000</td>
                                            <td>$1000</td>
                                            <td>Demo</td>
                                            <td>1.07</td>
                                            <td>+1000</td>
                                            <td>07 - 08 - 2024</td>
                                            <td>11.11AM</td>
                                            <td>Bullish</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </section>
    </article>
@endsection
