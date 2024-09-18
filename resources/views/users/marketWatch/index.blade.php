@extends('users.layouts.app_user')
@section('content')
    <article class="tab-content trade-article">
            <section id="trade-and-market-common-grid" class="trade-and-market-common-grid d-grid">
                <div class="card trade-and-market-common-card">
                    <div class="card-header">
                    <a href="{{ route('user.trade.index') }}" class="btn-tab">Tradable Assets</a>
                    <a href="{{ route('user.marketWatch.index') }}" class="btn-tab active">Market Watch</a>
                    </div>
                    <div class="card-body">
                        <div class="trade-and-market-common-table-area">
                            <div class="input-group search-input-group">
                                <input id="searchTableAssets" class="form-control search-input" type="search"
                                    placeholder="Search for assets etc...">
                                <label for="searchTableAssets" class="search-icon"><i
                                        class="fa-solid fa-magnifying-glass"></i></label>
                            </div>
                        </div>
                        <div class="market-watch-table-indicators scroll">
                            <a href="#user-market-watch-table-forex" class="btn active">
                                <span>Forex</span>
                                <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                            <a href="#user-market-watch-table-crypto" class="btn">
                                <span>Crypto</span>
                                <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                            <a href="#user-market-watch-table-indicies" class="btn">
                                <span>Indices</span>
                                <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                            <a href="#user-market-watch-table-futures" class="btn">
                                <span>Futures</span>
                                <span class="icon"><i class="fa-solid fa-arrow-right-long"></i></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div id="user-market-watch-area" class="user-market-watch-area w-100">
                    <div class="user-market-watch-table-area table-area scroll w-100">
                        <table class="user-market-watch-table w-100">
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
                            <tbody id="user-market-watch-table-forex">
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
                            <tbody id="user-market-watch-table-crypto" class="d-none">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>14</td>
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
                            </tbody>
                            <tbody id="user-market-watch-table-indicies" class="d-none">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>15</td>
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
                            <tbody id="user-market-watch-table-futures" class="d-none">
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="../assets/img/country-eur.png" class="icon">
                                            <span class="name">EURUSD </span>
                                        </div>
                                    </td>
                                    <td>16</td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </article>
@endsection
