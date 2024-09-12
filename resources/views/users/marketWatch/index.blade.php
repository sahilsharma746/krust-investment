@extends('users.layouts.app_user')
@section('content')
     <article class="tab-content trade-article">
            <section id="trade-and-market-common-grid" class="trade-and-market-common-grid d-grid">
                <div class="card trade-and-market-common-card">
                    <div class="card-header">
                        <a href="{{ route('user.marketWatch.index') }}" class="btn-tab ">Market Watch</a>
                        <a href="{{ route('user.trade.index') }}" class="btn-tab">Tradable Assets</a>
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
                            <dl class="trade-and-market-common-table scroll">
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-danger">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-danger">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-danger">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                                <dt class="d-flex justify-content-between align-items-center g-10">
                                    <div class="country-name d-flex align-items-center g-8">
                                        <img src="../assets/img/country-eur.png" alt="country flag" class="flag">
                                        <span>eurusd</span>
                                    </div>
                                    <div class="price">1.0953</div>
                                    <div class="percentage text-success">+0.77%</div>
                                </dt>
                            </dl>
                        </div>
                    </div>
                </div>

                <div id="user-market-watch-area" class="user-market-watch-area w-100">
                    <div class="user-market-watch-table-area table-area scroll w-100">
                        <table id="user-market-watch-table" class="user-market-watch-table w-100">
                            <thead>
                                <tr>
                                    <th>Asset</th>
                                    <th>Market Cap</th>
                                    <th>FD Market Cap</th>
                                    <th>Price</th>
                                    <th>Traded Volume</th>
                                    <th>Available Volume</th>
                                    <th>Change</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>13.564B</td>
                                    <td>13.564B</td>
                                    <td>3.9172523</td>
                                    <td>12.8261B</td>
                                    <td>257.192M</td>
                                    <td class="text-success">+23%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>13.564B</td>
                                    <td>13.564B</td>
                                    <td>3.9172523</td>
                                    <td>12.8261B</td>
                                    <td>257.192M</td>
                                    <td class="text-danger">-5.35%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>13.564B</td>
                                    <td>13.564B</td>
                                    <td>3.9172523</td>
                                    <td>12.8261B</td>
                                    <td>257.192M</td>
                                    <td class="text-danger">-5.35%</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>13.564B</td>
                                    <td>13.564B</td>
                                    <td>3.9172523</td>
                                    <td>12.8261B</td>
                                    <td>257.192M</td>
                                    <td class="text-danger">-5.35%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </article>
@endsection
