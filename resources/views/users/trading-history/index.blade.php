@extends('users.layouts.app_user')
@section('content')
    <article class="tab-content trade-article">
        <section id="payment-method-and-history" class="tab-pane common-section in active payment-method-and-history">
            @include('users.deposit.payment-method-menu')

            <div id="trading-history" class="trading-history collapse">
                <div class="area-title">trading history</div>
                <div class="trading-history-table-area table-area scroll w-100">
                    <table id="trading-history-table" class="trading-history-table w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Created</th>
                                <th>Asset</th>
                                <th>Manual/Auto</th>
                                <th>Live Demo</th>
                                <th>Trade</th>
                                <th>Market</th>
                                <th>PNL</th>
                                <th>Fain/loss</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>17QHA6QH</td>
                                <td>07-08-24</td>
                                <td>
                                    <div class="d-flex align-items-center g-8">
                                        <img src="{{ asset('assets/img/country-eur.png') }}" class="icon">
                                        <span class="name">EURUSD </span>
                                    </div>
                                </td>
                                <td>Manual Trade</td>
                                <td>Live</td>
                                <td>$1,000</td>
                                <td>Currency</td>
                                <td>+4005</td>
                                <td class="text-success">Gain</td>
                            </tr>
                            <tr>
                                <td>17QHA6QH</td>
                                <td>07-08-24</td>
                                <td>
                                    <div class="d-flex align-items-center g-8">
                                        <img src="{{ asset('assets/img/country-eur.png') }}" class="icon">
                                        <span class="name">EURUSD </span>
                                    </div>
                                </td>
                                <td>Manual Trade</td>
                                <td>Live</td>
                                <td>$1,000</td>
                                <td>Currency</td>
                                <td>+4005</td>
                                <td class="text-danger">Loss</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </section>
    </article>
@endsection

@section('scripts')
@endsection
