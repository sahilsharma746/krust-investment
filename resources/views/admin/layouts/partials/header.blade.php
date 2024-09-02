<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Krust-Investments | Admin</title>
    <link rel="icon" href="{{ asset('assets') }}/img/site-logo.png">
    <meta name="description" content="Open up a world of possibilities with Krust Investments">
    <meta name="keywords" content="Investments, krust, trade">

    <!-- nice select 2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/nice-select-2/nice-select2.css">

    <!-- style added here ================ -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/admin-layout.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/admin-style.css">

    <!-- font-awesome added here ================ -->
    <link rel="stylesheet" href="{{ asset('assets') }}/font-awesome-6.6.6-web/css/all.min.css">

    <!-- jQuery added here ================ -->
    <script src="{{ asset('assets') }}/jQuery/jquery-3.7.1.min.js"></script>
    <style>
        .form-control::placeholder {
            color: #aaa !important;
        }

        .form-control {
            color: #000 !important;
        }

        .text-dagner{
            color: red !important;
        }
    </style>
    @yield('styles')
</head>

<body>
    @include('admin.layouts.partials.sidebar')
    <header class="top-header">
        <div class="container">
            <h1 class="page-title">Overview</h1>
            <a id="btn-nav-toggle" class="btn-nav-toggle">
                <i class="fa-solid fa-bars"></i>
            </a>
            <div class="dropdown w-max">
                <a class="btn btn-admin-dropdown">
                    <span class="icon">
                        <img src="{{ asset(auth()->user()->avatar) }}" alt="{{ auth()->user()->name }}">
                    </span>
                    <span>{{ auth()->user()->name }}</span>
                    <i class="fa-solid fa-angle-down"></i>
                </a>

                <ul class="dropdown-menu d-flex flex-column">
                    <li class="dropdown-item">
                        Admin Name
                    </li>
                    <li class="dropdown-item">
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="d-flex justify-content-between align-items-center">
                            <span>Logout</span>
                            <span class="icon">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>
