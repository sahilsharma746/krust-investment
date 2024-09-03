@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/data-table-2.1.4/dataTables.dataTables.css">
@endsection
@section('content')
<main class="main-area">
    <div class="container manage-user-container">
        <section class="user-filter-section">
            @include('admin.deposit.nav')
        </section>
        <section class="all-user-table-area">
            <div class="section-title">All deposits</div>

            <table id="all-user-table" class="all-user-table display">
                <thead>
                    <tr>
                        <th>Date/Time</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Getway</th>
                        <th>Amount</th>
                        <th>Receipt</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d M, Y ') }}</td>
                            <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->payment_method ?? 'N/A' }}</td> 
                            <td>${{ number_format($data->amount, 2) }}</td>
             <td>                                {{-- <a target="_blank" href="{{ asset($data->receipt) }}">View Receipt</a> --}}
                <a target="_blank" href="{{ asset('uploads/Deposit_Receipt/' . $data->user_id . '/' . basename($data->receipt)) }}">View Receipt</a>


                            </td>
                            <td style="text-transform:capitalize">{{ $data->status }}</td>
                            <td>
                                <div class="dropdown w-max">
                                    <a class="btn-dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="list-style-none dropdown-menu d-flex flex-column">
                                        <li class="dropdown-item">
                                            @if ($data->status == 'pending')
                                                <a class="btn" href="{{ route('admin.deposit.approvedStatus', $data->id) }}">Approved</a>
                                                <a class="btn" href="{{ route('admin.deposit.rejectedStatus', $data->id) }}">Rejected</a>
                                            @endif
                                            <a class="btn" href="{{ route('admin.deposit.delete', $data->id) }}">Delete</a>
                                        </li>
                                    </ul>
                                </div>


                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="6">No data available</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </section>
    </div>


</main>
@endsection
@section('scripts')
    <script src="{{ asset('assets') }}/data-table-2.1.4/dataTables.js"></script>
@endsection
