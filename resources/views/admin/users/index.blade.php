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
                <div class="section-title"> {{ $page_title }}</div>

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
                         
                        @foreach ($all_users as $user)
                            <tr>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone ?? '(N/A)' }}</td>
                                <td>{{ '@' . $user->username }}</td>
                                <td>{{ config('countries.' . $user->addresses->country) }}</td>
                                <td>${{ $user->balance }}</td>
                                <td>
                                    <div class="dropdown w-max">
                                        <a class="btn-dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>

                                        <ul class="list-style-none dropdown-menu d-flex flex-column">
                                            <li class="dropdown-item">
                                                <a class="btn" href="{{ route('admin.user.details', $user->id) }}">View
                                                    User</a>
                                                <a class="btn"
                                                    href="{{ route('admin.user.editBalance', $user->id) }}">Edit balance</a>
                                                <a class="btn" href="{{ route('admin.user.banUser', $user->id) }}">Ban
                                                    User</a>
                                                <a class="btn"
                                                    href="{{ route('admin.user.deleteUser', $user->id) }}">Delete User</a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                           <!--  <tr>
                                <td class="text-center" colspan="6">No data available</td>
                            </tr> -->
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('assets') }}/data-table-2.1.4/dataTables.js"></script>
@endsection
