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
                <form action="{{ route('user.upgrade.plan') }}" method="POST" enctype="multipart/form-data" class="card">
                    @csrf
                    <!-- Include a hidden input field for user ID -->
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    
                    <h1 class="title text-center"><span class="text-primary">Account</span> Plans</h1>
                    <div class="card-group d-grid w-100">
                        @foreach ($plans as $plan_id => $features)
                            @php
                                $planName = $features->first()->name;
                                $planPrice = $features->first()->price;
                            @endphp
                            <div class="card d-flex flex-column {{ $user->account_type == $plan_id ? 'my-plan' : '' }}">
                                <div class="card-badge w-max">{{ $planName }}</div>
                                <div class="card-title">${{ $planPrice }}</div>
                                <dl class="item-list d-grid g-10">
                                    @foreach ($features as $feature)
                                        @if ($feature->feature_description)
                                            <dt>
                                                <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                                <span>{{ $feature->feature_description }}</span>
                                            </dt>
                                        @endif
                                    @endforeach
                                </dl>
                                @if ($user->account_type == $plan_id)
                                    <button type="button" class="btn w-max">Your Current Account</button>
                                @else
                                    {{-- <input type="hidden" name="plan_id" value="{{ $plan_id }}"> --}}
                                    <button type="submit" name="plan_id" value="{{ $plan_id }}" class="btn w-max">Upgrade Account</button>                                @endif
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
              
        </section>
    </article>
@endsection

@section('scripts')
@endsection
