@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/data-table-2.1.4/dataTables.dataTables.css">
@endsection
@section('content')
<main class="main-area">
    <div class="container manage-user-container">
        <section class="user-filter-section">
            <ul class="list-style-none">
                <li><a href="{{ route('admin.identyVerification.index') }}" class="btn {{ Request::url() == route('admin.identyVerification.index') ? 'active' : '' }}">all request</a></li>
                <li><a href="{{ route('admin.identyVerification.pending') }}" class="btn {{ Request::url() == route('admin.identyVerification.pending') ? 'active' : '' }}">Pending request</a></li>
                <li><a href="{{ route('admin.identyVerification.approved') }}" class="btn {{ Request::url() == route('admin.identyVerification.approved') ? 'active' : '' }}">Approved request</a></li>
                <li><a href="{{ route('admin.identyVerification.rejected') }}" class="btn {{ Request::url() == route('admin.identyVerification.rejected') ? 'active' : '' }}">Rejected request</a></li>
            </ul>
        </section>
        <section class="all-user-table-area">
            <div class="section-title">Verifications</div>

            <table id="all-user-table" class="all-user-table display">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>NID Front</th>
                        <th>NID Back</th>
                        <th>Proof Address</th>
                        <th>Selfe</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($datas as $data)
                        <tr>
                            <td>{{ $data->withUser->name }}</td>
                            <td>{{ $data->withUser->email }}</td>
                            <td>
                                <img src="{{ asset($data->nid_front) }}" alt="" class="img-fluid border" width="100">
                            </td>
                            <td>
                                <img src="{{ asset($data->nid_back) }}" alt="" class="img-fluid border" width="100">
                            </td>
                            <td>
                                <img src="{{ asset($data->proof_address) }}" alt="" class="img-fluid border" width="100">
                            </td>
                            <td>
                                <img src="{{ asset($data->selfe) }}" alt="" class="img-fluid border" width="100">
                            </td>
                            <td style="text-transform: capitalize;">{{ $data->status }}</td>
                            <td>
                                <div class="dropdown w-max">
                                    <a class="btn-dropdown">
                                        <i class="fa-solid fa-ellipsis-vertical"></i>
                                    </a>

                                    <ul class="list-style-none dropdown-menu d-flex flex-column">
                                        <li class="dropdown-item">
                                            @if ($data->status == 'pending')
                                                <a class="btn" href="{{ route('admin.identification.approvedStatus', $data->id) }}">Approved</a>
                                                <a class="btn" href="{{ route('admin.identification.rejectedStatus', $data->id) }}">Rejected</a>
                                            @endif
                                            <a class="btn" href="{{ route('admin.identification.delete', $data->id) }}">Delete</a>
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
