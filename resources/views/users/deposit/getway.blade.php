@extends('users.layouts.app_user')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/css/user-dashboard.css">
@endsection
@section('content')
    <article class="tab-content trade-article">
        <section id="payment-method-and-history" class="tab-pane common-section in active payment-method-and-history">
            @include('users.deposit.payment-method-menu')

            <div id="user-deposit-area" class="user-deposit-area collapse">
                <div class="area-title">Choose Payment Method</div>

                <div class="collapsible-card-group">
                    @foreach ($getways as $key => $getway)
                        <form action="{{ route('user.deposit.store', $getway->id) }}" method="POST" enctype="multipart/form-data" class="card">
                            @csrf
                            <div class="card-header">
                                <a data-toggle="collapse" href="#payment-{{ $getway->tab_id }}-tab" name="{{ $getway->name }}" class="d-flex align-items-center g-8 {{ $key == 0 ? 'active' : '' }}" >
                                    <img src="{{ asset('assets/img/' . $getway->logo) }}" alt="{{ $getway->tab_id }}">
                                    <span>{{ $getway->name }}</span>
                                </a>
                            </div>
                            <div id="payment-{{ $getway->tab_id }}-tab" class="payment-{{ $getway->tab_id }}-tab card-body collapse {{ $key == 0 ? 'active' : 'd-none' }}">
                                <p class="card-title">Make payment to the {{ $getway->name }} address below and upload receipt.</p>
                                <div class="payment-details-area d-grid align-items-center">
                                    <div class="input-group-area d-flex flex-column justify-content-between">
                                        <div class="input-group">
                                            <label class="form-label">amount</label>
                                            <input class="form-control" type="text" placeholder="enter amount to pay" name="amount">
                                            @error('amount')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                
                                        <div class="input-group">
                                            <label class="form-label">wallet address</label>
                                            <input class="form-control form-clone" type="text" name="wallet_address" readonly id="wallet-address{{ $key }}" value="{{ $getway->address }}">
                                            <label for="wallet-address{{ $key }}" class="form-icon clone-icon">
                                                <i class="fa-regular fa-clone"></i>
                                            </label>
                                        </div>
                
                                        <div class="input-group attach-file-input-group">
                                            <label class="form-label">Upload receipt</label>
                                            <div class="form-control">
                                                <label class="attach-icon d-flex justify-content-between align-items-center w-100">
                                                    <span type="placeholder">Upload payment receipt</span>
                                                    <input class="d-none" type="file" name="receipt">
                                                    <i class="fa-solid fa-link"></i>
                                                </label>
                                            </div>
                                        </div>
                                        @error('receipt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                
                                    <div class="qr-code-area">
                                        <div class="input-group">
                                            <label class="form-label">QR Code</label>
                                            <img class="img-qr-code" src="{{ asset('assets/img/dev-qr-code.png') }}" alt="qr-code">
                                        </div>
                                    </div>
                
                                    @if ($getway->name !== 'BITCOIN')
                                        <a data-toggle="modal" href="#depositConfirmationModal{{ $key }}" class="btn w-max">Deposit</a>
                                    @else
                                        <!-- For Bitcoin, directly show a deposit button or another relevant action -->
                                        <button class="btn w-max" type="submit">Deposit</button>
                                    @endif
                                </div>
                            </div>
                
                            @if ($getway->name !== 'Bitcoin')
                                <!-- Modal for non-Bitcoin payment methods -->
                                <div id="depositConfirmationModal{{ $key }}" class="modal depositConfirmationModal{{ $key }}">
                                    <div class="modal-dialog d-flex flex-column justify-content-center align-items-center">
                                        <div class="modal-body text-center">
                                            <h3 class="modal-title">Requesting Payment Info</h3>
                                            <p class="modal-text">You are requesting Bank Wire Transfer Payment Information in order to fund your wallet</p>
                                            <div class="btn-area d-flex g-15 justify-content-center">
                                                <button class="btn btn-modal-close btn-confirm-info" type="submit">Yes</button>
                                                <a class="btn btn-modal-close text-bg-primary">No</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </form>
                    @endforeach
                </div>
                
               
                <div class="clear-fix"></div>
                <div class="area-title">Deposit History</div>
                <div class="deposit-table-area table-area scroll">
                    <table class="deposit-table w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Date</th>
                                <th>Address</th>
                                <th>Currency</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($datas as $data)
                                <tr>
                                    <td>#{{ ++$loop->index }}</td>
                                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-y') }}</td>
                                    <td>{{ $data->getway->address }}</ <td>USD</td>
                                    <td>${{ $data->amount }}</td>

                                    @if ($data->status == 'pending')
                                        <td isConfirmed="false" style="text-transform:capitalize;">pending</td>
                                    @elseif($data->status == 'approved')
                                        <td isConfirmed="true" style="text-transform:capitalize;">approved</td>
                                    @elseif($data->status == 'rejected')
                                        <td style="text-transform:capitalize; color:red; background:#a21a1a1a;">rejected
                                        </td>
                                    @endif
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="50">No Data Available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </article>
@endsection

@section('scripts')
    <script src="{{ asset('assets') }}/js/user-dashboard.js"></script>
@endsection
