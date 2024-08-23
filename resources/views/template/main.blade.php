<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        Destinasiku | Find Your Destinations
    </title>
    <link rel="icon" href="favicon.ico">
    @yield('css')
    @vite('resources/css/app.css')
    <link href="{{ asset('assets/dashboard.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': true, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false,showPrivacyPolicy: false }"
    x-init="darkMode = JSON.parse(localStorage.getItem('darkMode'));
$watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{ 'dark text-bodydark bg-boxdark-2': darkMode === true }">
<!-- ===== Preloader Start ===== -->
@include('template.preload')
<!-- ===== Preloader End ===== -->

<!-- ===== Page Wrapper Start ===== -->
<div class="flex h-screen overflow-hidden">
    <!-- ===== Sidebar Start ===== -->
    @include('template.sidebar')
    <!-- ===== Sidebar End ===== -->

    <!-- ===== Content Area Start ===== -->
    <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
        <!-- ===== Header Start ===== -->
        @include('template.header')
        <!-- ===== Header End ===== -->

        <!-- ===== Main Content Start ===== -->
        <main>

            <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                @include('template.message')
                @yield('main-content', 'Main content')
            </div>
        </main>
        <!-- ===== Main Content End ===== -->
    </div>
    <!-- ===== Content Area End ===== -->
</div>
<!-- ===== Page Wrapper End ===== -->

<script defer src="{{ asset('assets/dashboard.js') }}"></script>
@yield('script')
<script>
    function confirmDelete(event, url) {
        event.preventDefault(); // Mencegah default action dari link
        const confirmed = confirm("Apakah Anda yakin ingin menghapus data ini?");
        if (confirmed) {
            window.location.href = url; // Redirect ke URL penghapusan jika dikonfirmasi
        }
    }

    function confirmLogout(event, url) {
        event.preventDefault(); // Mencegah default action dari link
        const confirmed = confirm("Apakah Anda yakin ingin keluar?");
        if (confirmed) {
            window.location.href = url; // Redirect ke URL penghapusan jika dikonfirmasi
        }
    }
</script>
</body>

</html>
