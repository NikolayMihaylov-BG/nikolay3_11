<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Пиринея') }}</title>

    @vite(['resources/js/app.js'])
    @vite(['resources/css/app.css'])
    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
<div class="app-wrapper">
    <!--begin::Header-->
    @include('admin.partials.navbar')
    <!--end::Header-->
    <!--begin::Sidebar-->
    @include('admin.partials.sidebar')
    <!--end::Sidebar-->
    <!--begin::App Main-->
    <main class="app-main">
        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid mt-3">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
    <!--end::App Main-->
    <!--begin::Footer-->
    @include('admin.partials.footer')
    <!--end::Footer-->
</div>
@vite(['resources/js/admin/main.js'])
@stack('scripts')
</body>
</html>
