<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>@yield('title') | Gestion des Balises</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @stack('head')
</head>
<body style="background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%); min-height: 100vh; display: flex; flex-direction: column;">
    @include('admin.navbar')
    <div class="flex-1 container mt-5 mb-4">
        @include('shared.flash')
        @yield('content')
    </div>
        @include('admin.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>