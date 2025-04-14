<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite([ 'resources/css/app.css',
    'resources/js/app.js',])
    <title>@yield('title') | Gestion des Balises</title>
    @vite(['resources/css/app.css','resources/js/app.js',])
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"> 
</head>
<body>
    <div class="container mt-5">
        @include('shared.flash')
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>
</html>
@include('admin.footer')