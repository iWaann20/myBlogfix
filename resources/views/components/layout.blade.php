<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Themesbrand" name="author"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/preloader.min.css" type="text/css" />
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body data-layout-mode="{{ Auth::user()->theme_preferences['layout-mode'] ?? 'light' }}"
    data-layout-width="{{ Auth::user()->theme_preferences['layout-width'] ?? 'fluid' }}"
    data-layout-position="{{ Auth::user()->theme_preferences['layout-position'] ?? 'fixed' }}"
    data-topbar="{{ Auth::user()->theme_preferences['topbar-color'] ?? 'light' }}"
    data-sidebar-size="{{ Auth::user()->theme_preferences['sidebar-size'] ?? 'small' }}"
    data-sidebar="{{ Auth::user()->theme_preferences['sidebar-color'] ?? 'light' }}">
    <div id="layout-wrapper">
        <x-navbar />
        <x-sidebar />
        @if (session()->has('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif
        @if (session()->has('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: "{{ session('error') }}",
                    timer: 3000,
                    showConfirmButton: false
                });
            </script>
        @endif
        {{ $slot }}
    </div>
    <x-right-sidebar />
    @php
        $themePreferences = auth()->user()->theme_preferences ?? [];
    @endphp

    @foreach($themePreferences as $key => $value)
        <script>document.body.setAttribute('data-{{ $key }}', '{{ $value }}');</script>
    @endforeach
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/libs/pace-js/pace.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>