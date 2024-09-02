@extends('layouts.app')
@section('styles')
<style>
    section.account-plan {
        margin-block: 40px 100px;

        .card-group {
            margin-top: 42px;
        }
    }
</style>
@endsection
@section('content')
<main>
    <section class="account-plan">

        <div class="container">
            <h1 class="title text-center"><span class="text-primary">Account</span> Plans</h1>

            <div class="card-group d-flex flex-wrap justify-content-evenly w-100">
                <div class="card d-flex flex-column">
                    <div class="card-badge w-max">Standard</div>
                    <div class="card-title">$500</div>
                    <dl class="item-list d-grid g-10">
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Up to 25% margin loan</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily news</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Trading Academy</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Weekly market review</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Account manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Weekly portfolio progress report</span>
                        </dt>
                    </dl>
                    <a href="{{ route('register', ['plan_type' => 1]) }}" class="btn w-max">Open account</a>
                </div>
                <div class="card d-flex flex-column">
                    <div class="card-badge w-max">Silver</div>
                    <div class="card-title">$1000</div>
                    <dl class="item-list d-grid g-10">
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Up to 35% margin loan</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily market review</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily portfolio progress report</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Work with a portfolio manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Monthly session with certified accountant</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>24/7 account monitoring by top analyst group</span>
                        </dt>
                    </dl>
                    <a href="{{ route('register', ['plan_type' => 2]) }}" class="btn w-max">Open account</a>
                </div>
                <div class="card d-flex flex-column">
                    <div class="card-badge w-max">Gold</div>
                    <div class="card-title">$5000</div>
                    <dl class="item-list d-grid g-10">
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Up to 50% margin loan</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily market review</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Weekly live stream trading webinar</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Weekly 1 on 1 with market Analyst</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Everything in Standard &amp; Silver</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>End of year summary with certified Tax specialist</span>
                        </dt>
                    </dl>
                    <a href="{{ route('register', ['plan_type' => 3]) }}" class="btn w-max">Open account</a>
                </div>
                <div class="card d-flex flex-column">
                    <div class="card-badge w-max">VIP</div>
                    <div class="card-title">$100,000</div>
                    <dl class="item-list d-grid g-10">
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Up to 75% margin loan</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily market review</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily portfolio progress report</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Personal portfolio manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Weekly live stream trading webinar</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Customized Education</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily market signals</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>In-Depth Research</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Invites to VIP events</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Managed Portfolio</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>VIP Advisor</span>
                        </dt>
                    </dl>
                    <a href="{{ route('register', ['plan_type' => 4]) }}" class="btn w-max">Open account</a>
                </div>
                <div class="card d-flex flex-column">
                    <div class="card-badge w-max">Pro</div>
                    <div class="card-title">$500,000</div>
                    <dl class="item-list d-grid g-10">
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Up to 100% margin loan</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily market review &amp; signals</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Unlimited access to brokers</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Personal chief portfolio manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Customized Education</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily one on one live stream trading webinar with top analyst</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Wealth Manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Invites to VIP events</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Managed Portfolio</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Higher Payouts</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Super tight spreads</span>
                        </dt>
                    </dl>
                    <a href="{{ route('register', ['plan_type' => 5]) }}" class="btn w-max">Open account</a>
                </div>
                <div class="card d-flex flex-column">
                    <div class="card-badge w-max">Pro VIP</div>
                    <div class="card-title">$1,000,000</div>
                    <dl class="item-list d-grid g-10">
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Up to 100% margin loan</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily market review &amp; signals</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Unlimited access to brokers</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Personal chief portfolio manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Customized Education</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Daily one on one live stream trading webinar with top analyst</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Wealth Manager</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Invites to VIP events</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Managed Portfolio</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Higher Payouts</span>
                        </dt>
                        <dt>
                            <img src="{{ asset('assets') }}/img/right-tick-vector.png" class="card-img">
                            <span>Super tight spreads</span>
                        </dt>
                    </dl>
                    <a href="{{ route('register', ['plan_type' => 6]) }}" class="btn w-max">Open account</a>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@endsection
