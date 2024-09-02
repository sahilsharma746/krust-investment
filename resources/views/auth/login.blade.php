@extends('layouts.app')

@section('content')
<main>

    <section class="login-section">
        <div class="container d-flex flex-wrap justify-content-between align-items-center">
            <div class="left-content ">
                <h1 class="section-title">Your investment journey starts here.</h1>
                <p class="section-text">Take control of your financial future. Our platform offers a seamless
                    investing experience, from beginner to pro.
                    Explore a diverse range of investment options, gain valuable insights, and watch your
                    portfolio
                    grow. Join the Krust
                    community today.</p>
            </div>
            <div class="right-content w-100">
                <div class="card-header">
                    <div id="login-signup-tab-area" class="d-flex justify-content-center g-20">
                        <a href="{{ route('login') }}" class="btn-tab {{ Request::url() == route('login') ? 'active' : '' }}">Log In</a>
                        <span>|</span>
                        <a href="{{ route('register') }}" class="btn-tab {{ Request::url() == route('register') ? 'active' : '' }}">Sign Up</a>
                    </div>
                </div>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div id="login-card" class="card login-card">
                        <div class="card-body d-grid g-8">
                            <div class="input-group">
                                <label class="form-label">Email</label>
                                <input class=" form-control" type="email" name="email" id="loginEmai;" placeholder="Enter email address">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="form-label">Password</label>
                                <input class="form-control form-eye" type="password" name="password" id="loginPassword" placeholder="Enter password">
                                <label for="loginPassword" class="eye-icon">
                                    <svg class="svg-inline--fa fa-eye-slash" aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye-slash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zm151 118.3C226 97.7 269.5 80 320 80c65.2 0 118.8 29.6 159.9 67.7C518.4 183.5 545 226 558.6 256c-12.6 28-36.6 66.8-70.9 100.9l-53.8-42.2c9.1-17.6 14.2-37.5 14.2-58.7c0-70.7-57.3-128-128-128c-32.2 0-61.7 11.9-84.2 31.5l-46.1-36.1zM394.9 284.2l-81.5-63.9c4.2-8.5 6.6-18.2 6.6-28.3c0-5.5-.7-10.9-2-16c.7 0 1.3 0 2 0c44.2 0 80 35.8 80 80c0 9.9-1.8 19.4-5.1 28.2zm9.4 130.3C378.8 425.4 350.7 432 320 432c-65.2 0-118.8-29.6-159.9-67.7C121.6 328.5 95 286 81.4 256c8.3-18.4 21.5-41.5 39.4-64.8L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5l-41.9-33zM192 256c0 70.7 57.3 128 128 128c13.3 0 26.1-2 38.2-5.8L302 334c-23.5-5.4-43.1-21.2-53.7-42.3l-56.1-44.2c-.2 2.8-.3 5.6-.3 8.5z"></path></svg><!-- <i class="fa-regular fa-eye-slash"></i> Font Awesome fontawesome.com -->
                                </label>
                            </div>
                            @error('password')
                                <span class="danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn submit-login">Log In</button>
                            <p class="text-center">Forgot password?
                                <a href="{{ route('password.request') }}" class="btn-tab text-primary">Click Here</a>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>
@endsection
