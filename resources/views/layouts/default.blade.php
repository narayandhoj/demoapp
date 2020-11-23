<!DOCTYPE html>
<html lang="en">
<head>

    @include('partials/metadata')
    
    @stack('styles')

    <script>
        var app_url = "{{env('APP_URL')}}";
    </script>
                    
</head>
<body>
    
    @include('partials/header')
        <!-- Page content -->
    <div class="page-content">
        @include('partials/sidebar')
        <!-- Main content -->
        <div class="content-wrapper">
            
            @yield('content')

            @include('partials/footer')
        </div>
    </div>

    @include('partials/scripts')

    @stack('scripts')

    @yield('scripts')

</body>