@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/data-table-2.1.4/dataTables.dataTables.css">
@endsection
@section('content')
    <main class="main-area">
        <div class="container manage-user-container">
            <section class="user-filter-section">
                @include('admin.users.manage-user-nav')
            </section>
            <section class="all-user-table-area">
                <div class="section-title">All Users</div>

                <table id="all-user-table" class="all-user-table display">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>UserName</th>
                            <th>Country</th>
                            <th>Balance</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($datas as $data)
                            <tr>
                                <td>{{ $data->first_name }} {{ $data->last_name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone ?? '(N/A)' }}</td>
                                <td>{{ '@' . $data->username }}</td>
                                <td>{{ $data->country }}</td>
                                <td>${{ $data->balance }}</td>
                                <td>
                                    <div class="dropdown w-max">
                                        <a class="btn-dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="list-style-none dropdown-menu d-flex flex-column">
                                            <li class="dropdown-item">
                                                <a class="btn" href="{{ route('admin.user.details', $data->id) }}">View
                                                    User</a>
                                                <a class="btn"
                                                    href="{{ route('admin.user.editBalance', $data->id) }}">Edit balance</a>
                                                <a class="btn" href="{{ route('admin.user.banUser', $data->id) }}">Ban
                                                    User</a>
                                                <a class="btn"
                                                    href="{{ route('admin.user.deleteUser', $data->id) }}">Delete User</a>
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
