<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    {{-- <link rel="stylesheet" href="./assets/css/styles.min.css" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">
    <script src="{{ asset('assets/js/students.js') }}"></script>
    <title>Student Management</title>

</head>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    {{-- @include('layouts.topstrip') --}}
    @include('layouts.slider')
    <div class="body-wrapper">

        @include('layouts.header')
        <div class="body-wrapper-inner">
            <div class="container-fluid">

                @yield('content')
            </div>
        </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/sidebarmenu.js"></script>
    <script src="./assets/js/app.min.js"></script>
    <script src="./assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="./assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="./assets/js/dashboard.js"></script>
    <!-- solar icons -->
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    </body>

</html>
