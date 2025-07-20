<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    

</head>
<body>
    @include('admin.header.header')

    <div class="layout">  {{-- Add this --}}
        @include('admin.header.sidebar')

        <main>
            @yield('content')
        </main>
    </div>

    @include('admin.footer.footer')
</body>

