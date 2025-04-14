<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') |GestionBalises</title>
</head>
<body>
    @include('admin.navbar')
        @yield('content')
    @include('admin.footer')
</body>
</html>