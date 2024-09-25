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
                @foreach ($plans as $plan_id => $features)
                    @php
                        $planName = $features->first()->name;
                        $planPrice = $features->first()->price;
                    @endphp
                    <div class="card d-flex flex-column">
                        <div class="card-badge w-max">{{ $planName }}</div>
                        <div class="card-title">${{ number_format($planPrice, 0) }}</div>
                        <dl class="item-list d-grid g-10">
                            @foreach ($features as $feature)
                                        @if ($feature->feature_description)
                                            <dt>
                                                <img src="{{ asset('assets/img/right-tick-vector.png') }}" class="card-img">
                                                <span>{!! $feature->feature_description !!}</span> <!-- Display raw HTML -->
                                            </dt>
                                        @endif
                                    @endforeach
                            <a href="{{ route('register', ['plan_type' => $plan_id]) }}" class="btn w-max">Open account</a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</main>
@endsection
@section('scripts')
@endsection
