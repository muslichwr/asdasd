<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin/header')
    @livewireStyles


</head>

<body>
    <nav>
        @include('admin/navbar')
    </nav>

    <section class="dashboard">
        <div class="top">
            @include('admin/headernavbar')
        </div>
        <div class="title">
                    <div class="container">
                        <h1>@yield('title')</h1>
                        <h8>Si Catat Aplikasi</h8>
                    </div>
                </div>
        <div class="container">
            @yield('content')
        </div>
    </section>
    
    @stack('scripts')
    @include('admin/javascript')
    @livewireScripts
     
</body>

</html>