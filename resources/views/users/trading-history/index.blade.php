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
                            @foreach ($trades as $trade)
                                <tr>
                                    <td>{{ $trade->id }}</td>
                                    <td>{{ $trade->created_at->format('d-m-y') }}</td>
                                    <td>
                                        <div class="d-flex align-items-center g-8">
                                            <img src="{{ asset('assets/img/country-eur.png') }}" class="icon">
                                            <span class="name">{{ $trade->asset }}</span>
                                        </div>
                                    </td>
                                    <td>Manual</td> 
                                    <td>{{ $trade->trade_type }}</td> 
                                    <td>${{$trade->capital }}</td>
                                    <td>Currency</td> 
                                    <td>{{ number_format($trade->pnl, 2) }}</td> 
                                    <td class="{{ $trade->pnl >= 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $trade->pnl >= 0 ? 'Gain' : 'Loss' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </section>
    </article>
@endsection