@extends('admin.layouts.app_admin')
@section('content')
<main class="main-area">
        <div class="container">
            <section class="all-trade-table-area data-table-area">
                <div class="section-title">All Trades</div>

                <table id="all-trade-table" class="all-trade-table display nowrap order-column">
                    <thead>
                        <tr>
                            <th>Transaction ID</th>
                            <th>User</th>
                            <th>Symbol</th>
                            <th>Date/Time</th>
                            <th>Amount</th>
                            <th>Type</th>
                            <th>Result</th>
                            <!-- <th>Trade Action</th>
                            <th>Trade Time</th>
                            <th>Payout</th>
                            <th>%</th>
                            <th>P/L</th> -->
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>91HS82S</td>
                            <td>
                                <div class="name">Michael Michaelson</div>
                                <div class="email">@micky Michaelson</div>
                            </td>
                            <td>
                                <div class="symbol d-flex align-items-center g-8">
                                    <img src="../assets/img/country-eur.png">
                                    <div class="name">EURUSD</div>
                                </div>
                            </td>
                            <td>
                                <div class="date">08 - 08 - 2024</div>
                                <div class="time">2:15 PM</div>
                            </td>
                            <td>$ 120,000</td>
                            <td>Demo</td>
                            <td class="text-primary">Win</td>
                            <!-- <td>Up</td>
                            <td>4 Hours</td>
                            <td>$64,700</td>
                            <td>85%</td>
                            <td>+ 28,750 USD</td> -->
                            <td>
                                <div class="dropdown w-max">
                                    <a class="btn-dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="list-style-none dropdown-menu d-flex flex-column">
                                        <li class="dropdown-item">
                                            <a class="btn btn-delete-dt-tr">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>91HS82S</td>
                            <td>
                                <div class="name">Michael Michaelson</div>
                                <div class="email">@micky Michaelson</div>
                            </td>
                            <td>
                                <div class="symbol d-flex align-items-center g-8">
                                    <img src="../assets/img/country-eur.png">
                                    <div class="name">EURUSD</div>
                                </div>
                            </td>
                            <td>
                                <div class="date">08 - 08 - 2024</div>
                                <div class="time">2:15 PM</div>
                            </td>
                            <td>$ 120,000</td>
                            <td>Live</td>
                            <td class="text-danger">Lose</td>
                            <!-- <td>Down</td>
                            <td>4 Hours</td>
                            <td>$64,700</td>
                            <td>85%</td>
                            <td>+ 28,750 USD</td> -->
                            <td>
                                <div class="dropdown w-max">
                                    <a class="btn-dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="list-style-none dropdown-menu d-flex flex-column">
                                        <li class="dropdown-item">
                                            <a class="btn btn-delete-dt-tr">Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>


    </main>
@endsection