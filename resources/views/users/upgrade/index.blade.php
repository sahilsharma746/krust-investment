@extends('users.layouts.app_user')

@section('content')
    <article class="tab-content trade-article">
        <section id="payment-method-and-history" class="tab-pane common-section in active payment-method-and-history">
            @include('users.upgrade.top-nav')
            
            <div id="user-upgrade-account" class="user-upgrade-account collapse">
                <div class="account-plan">
                    <style>
                        .account-plan {
                            margin-block: 40px 100px;

                            .card-group {
                                margin-top: 42px;
                            }
                        }
                    </style>
                    <div class="container">
                        <h1 class="title text-center"><span class="text-primary">Account</span> Plans</h1>
                        <div class="card-group d-grid w-100">

                            <!-- Standard Account -->
                            <div class="card d-flex flex-column my-plan">
                                <div class="card-badge w-max">Standard Account</div>
                                <div class="card-title">$1,000</div>
                                <dl class="item-list d-grid g-10">
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Minimum Investment: $1,000</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Margin Loan: Up to 10%</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Trade Limit: 3 trades</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Access to Trading Academy</span>
                                    </dt>
                                </dl>
                                 <button type="button" class="btn w-max">Your Current Account</button>

                            </div>

                            <!-- Silver Account -->
                            <div class="card d-flex flex-column">
                                <div class="card-badge w-max">Silver Account</div>
                                <div class="card-title">$5,000</div>
                                <dl class="item-list d-grid g-10">
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Minimum Investment: $5,000</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Margin Loan: Up to 25%</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Trade Limit: 7 trades</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Access to Trading Academy</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Dedicated Account Manager</span>
                                    </dt>
                                </dl>
                                 <button type="button" class="btn w-max">Your Current Account</button>

                            </div>

                            <!-- Bronze Account -->
                            <div class="card d-flex flex-column">
                                <div class="card-badge w-max">Bronze Account</div>
                                <div class="card-title">$20,000</div>
                                <dl class="item-list d-grid g-10">
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Minimum Investment: $20,000</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Margin Loan: Up to 35%</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Trade Limit: 14 trades</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Access to Trading Academy</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Dedicated Account Manager</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Market Review</span>
                                    </dt>
                                </dl>
                                 <button type="button" class="btn w-max">Your Current Account</button>

                            </div>

                            <!-- Gold Account -->
                            <div class="card d-flex flex-column">
                                <div class="card-badge w-max">Gold Account</div>
                                <div class="card-title">$50,000</div>
                                <dl class="item-list d-grid g-10">
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Minimum Investment: $50,000</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Margin Loan: Up to 50%</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Trade Limit: 20 trades</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Access to Trading Academy</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Dedicated Account Manager</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Market Review</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Weekly 1-on-1 Sessions with a Market Analyst</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Weekly Livestream Trading Webinar</span>
                                    </dt>
                                </dl>
                                 <button type="button" class="btn w-max">Your Current Account</button>

                            </div>

                            <!-- VIP Account -->
                            <div class="card d-flex flex-column">
                                <div class="card-badge w-max">VIP Account</div>
                                <div class="card-title">$100,000</div>
                                <dl class="item-list d-grid g-10">
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Minimum Investment: $100,000</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Margin Loan: Up to 75%</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Trade Limit: Unlimited</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Access to Trading Academy</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Personal Portfolio Manager</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Portfolio Progress Reports</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Exclusive VIP Events</span>
                                    </dt>
                                </dl>
                                 <button type="button" class="btn w-max">Your Current Account</button>


                            </div>
                            <div class="card d-flex flex-column">
                                <div class="card-badge w-max">Pro VIP Account</div>
                                <div class="card-title">$1,000,000</div>
                                <dl class="item-list d-grid g-10">
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Minimum Investment: $1,000,000</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Margin Loan: Up to 100%</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Trade Limit: Unlimited</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Customized Education Program</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Wealth Manager</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Personal Portfolio Manager</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Portfolio Progress Reports</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Daily Market Review</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Weekly 1-on-1 Sessions with a Market Analyst</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Weekly Livestream Trading Webinar</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>End-of-Year Summary with a Certified Tax Specialist</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Invitations to Exclusive VIP Events</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>Super Tight Spreads</span>
                                    </dt>
                                    <dt> <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                        <span>24/7 Account Monitoring by Our Top Analyst Group</span>
                                    </dt>
                                </dl>
                                <button type="button" class="btn w-max">Your Current Account</button>

                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </section> 
    </article>
@endsection
