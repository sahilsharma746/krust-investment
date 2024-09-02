@extends('admin.layouts.app_admin')
@section('content')
    <main class="main-area">
        <div class="container user-details-container">
            <div class="partial-view-header">
                <div class="back-btn-area">
                    <a href="./manage-user.html">
                        <span class="icon">
                            <i class="fa-solid fa-arrow-left"></i>
                        </span>
                        <span>Manage Users</span>
                    </a>
                    <span>/</span>
                    <span>Michael Michaelson</span>
                </div>
                <a href="" class="btn">Log in As User</a>
            </div>

            <section class="user-info-form">
                <div class="section-title">Edit Balance</div>
                <form action="{{ route('admin.user.updateBalance', $user->id) }}" method="POST">
                    @csrf
                    <div class="card common-card">
                        <div class="card-body">
                            <div class="input-group">
                                <label class="form-label" for="amount">Amount</label>
                                <input class="form-control" type="number" placeholder="Enter amount" name="amount" value="{{ old('amount') }}">
                                @error('amount')
                                    <span class="text-dagner">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="input-group">
                                <label class="form-label" for="type">Type</label>
                                <select name="type" id="type" class="form-control">
                                    <option {{ old('type') == 'credit' ? 'selected' : '' }} value="credit">Credit</option>
                                    <option {{ old('type') == 'debit' ? 'selected' : '' }} value="debit">Debit</option>
                                </select>
                                @error('type')
                                    <span class="text-dagner">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn border-0">Add Balance</button>
                    </div>
                </form>

            </section>
        </div>
    </main>
@endsection
