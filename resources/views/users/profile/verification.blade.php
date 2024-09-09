@extends('users.layouts.app_user')
@section('content')
    <article class="tab-content trade-article">
        <section id="account-verification" class="tab-pane in account-verification common-section active">
            <div class="back-btn-area">
                <ul class="nav nav-tabs list-style-none">
                    <li class="nav-item d-flex align-items-center g-15">
                        <a class="btn-tab d-flex align-items-center g-15" data-toggle="tab" href="#admin-account-grid">
                            <svg class="svg-inline--fa fa-arrow-left" aria-hidden="true" focusable="false" data-prefix="fas"
                                data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512" data-fa-i2svg="">
                                <path fill="currentColor"
                                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z">
                                </path>
                            </svg><!-- <i class="fa-solid fa-arrow-left"></i> Font Awesome fontawesome.com -->
                            <span class="text">Account</span>
                        </a>
                        <p class="section-name d-flex g-15">
                            <span>/</span>
                            <span>Verification</span>
                        </p>
                    </li>
                </ul>
            </div>
            <div class="area-title d-flex justify-content-between">
                <h3>Identification</h3>
                <p class="verification-status d-flex align-items-center g-5 {{ auth()->user()->verify_status == 'Verified' ? 'text-success' : '' }}">
                    <!-- use $('.verification-status').attr "verified" for verify -->
                    <span class="icon d-flex justify-content-center align-items-center "><svg class="svg-inline--fa fa-check"
                            aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                            <path fill="currentColor"
                                d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                            </path>
                        </svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></span>
                    <span class="status-text">{{ auth()->user()->verify_status }}</span>
                </p>
            </div>
            <form action="{{ route('user.profile.verificationUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card common-card">
                    <div class="card-header">
                        <div class="card-title">Profile Status: {{ auth()->user()->verify_status }}</div>
                    </div>
                    <div class="card-body d-grid">
                        <div>
                            <div class="input-group">
                                <label class="form-label">Upload ID Front</label>
                                <div class="form-control">
                                    <label for="identification-front-id"
                                        class="attach-icon d-flex justify-content-between align-items-center w-100">
                                        <span type="placeholder">Upload ID card Front</span>
                                        <input id="identification-front-id" {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'disabled readonly' : '' }} class="d-none" name="nid_front" type="file" placeholder="Upload pppD card Front">
                                        <svg class="svg-inline--fa fa-link" aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z">
                                            </path>
                                        </svg><!-- <i class="fa-solid fa-link"></i> Font Awesome fontawesome.com -->
                                    </label>
                                </div>
                            </div>
                            @error('nid_front')
                                <span class="text-danger d-block">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <div class="input-group">
                                <label class="form-label">Upload ID back</label>
                                <div class="form-control">
                                    <label for="identification-back-id"
                                        class="attach-icon d-flex justify-content-between align-items-center w-100">
                                        <span type="placeholder">Upload ID card back</span>
                                        <input id="identification-back-id" class="d-none" name="nid_back" type="file"
                                            placeholder="Upload ID card back" {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'disabled readonly' : '' }}>
                                        <svg class="svg-inline--fa fa-link" aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"
                                            data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z">
                                            </path>
                                        </svg><!-- <i class="fa-solid fa-link"></i> Font Awesome fontawesome.com -->
                                    </label>
                                </div>
                            </div>
                            @error('nid_back')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>



                        <div>
                            <div class="input-group">
                                <label class="form-label">Upload Proof Of Address</label>
                                <div class="form-control">
                                    <label for="user-proof-of-address"
                                        class="attach-icon d-flex justify-content-between align-items-center w-100">
                                        <span type="placeholder">Upload Proof Of Address</span>
                                        <input id="user-proof-of-address" {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'disabled readonly' : '' }} class="d-none" type="file"
                                            placeholder="Upload ID card Front" name="proof_address">
                                        <svg class="svg-inline--fa fa-link" aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="link" role="img" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 640 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z">
                                            </path>
                                        </svg><!-- <i class="fa-solid fa-link"></i> Font Awesome fontawesome.com -->
                                    </label>
                                </div>
                            </div>
                            @error('proof_address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div>
                            <div class="input-group">
                                <label class="form-label">Upload Selfie</label>
                                <div class="form-control">
                                    <label for="attach-user-selfie"
                                        class="attach-icon d-flex justify-content-between align-items-center w-100">
                                        <span type="placeholder">Upload Selfie</span>
                                        <input id="attach-user-selfie" {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'disabled readonly' : '' }} class="d-none" type="file" accept="image/*"
                                            capture="environment" placeholder="Upload ID card Front" name="selfe">
                                        <svg class="svg-inline--fa fa-camera" aria-hidden="true" focusable="false"
                                            data-prefix="fas" data-icon="camera" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                            <path fill="currentColor"
                                                d="M149.1 64.8L138.7 96 64 96C28.7 96 0 124.7 0 160L0 416c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64l-74.7 0L362.9 64.8C356.4 45.2 338.1 32 317.4 32L194.6 32c-20.7 0-39 13.2-45.5 32.8zM256 192a96 96 0 1 1 0 192 96 96 0 1 1 0-192z">
                                            </path>
                                        </svg><!-- <i class="fa-solid fa-camera"></i> Font Awesome fontawesome.com -->
                                    </label>
                                </div>
                            </div>
                            @error('selfe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer">
                        @if (!empty($identification->status) && $identification->status == 'pending')
                            <button class="btn btn-submit-identification w-max" disabled type="button">Under Reviewing</button>
                        @elseif (!empty($identification->status) && $identification->status == 'approved')
                            <button class="btn btn-submit-identification w-max" disabled type="button">Approved</button>
                        @else
                            <button class="btn btn-submit-identification w-max" type="submit">Submit identification</button>
                        @endif
                    </div>
                </div>
            </form>
            <div class="card common-card">
                <div class="card-header">
                    <div class="card-title">Documents Uploaded and Confirmed</div>
                </div>
                <div class="card-footer check-files-valid-grid d-grid">
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>ID Front</p>
                        <p class="document-verification-status d-flex justify-content-center align-items-center g-5"
                            data-label="identification-front-id" {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'verified' : '' }} >
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><svg
                                    class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="check" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                    </path>
                                </svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></span>
                        </p>
                    </div>
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>ID Back</p>
                        <p class="document-verification-status d-flex justify-content-center align-items-center g-5"
                            data-label="identification-back-id"  {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'verified' : '' }}>
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><svg
                                    class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="check" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                    </path>
                                </svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></span>
                        </p>
                    </div>
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>proof of address</p>
                        <p class="document-verification-status d-flex justify-content-center align-items-center g-5"
                            data-label="user-proof-of-address"  {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'verified' : '' }}>
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><svg
                                    class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="check" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                    </path>
                                </svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></span>
                        </p>
                    </div>
                    <div class="card d-flex justify-content-between align-items-center">
                        <p>upload selfie</p>
                        <p class="document-verification-status d-flex justify-content-center align-items-center g-5"
                            data-label="attach-user-selfie"  {{ !empty($identification->status) == 'pending' || !empty($identification->status) == 'approved' ? 'verified' : '' }}>
                            <!-- use $('.verification-status').attr "verified" for verify -->
                            <span class="icon d-flex justify-content-center align-items-center"><svg
                                    class="svg-inline--fa fa-check" aria-hidden="true" focusable="false"
                                    data-prefix="fas" data-icon="check" role="img"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor"
                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z">
                                    </path>
                                </svg><!-- <i class="fa-solid fa-check"></i> Font Awesome fontawesome.com --></span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </article>
@endsection
