<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- this layout is for bootstrap files to applay on tasks page --}}

    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>
