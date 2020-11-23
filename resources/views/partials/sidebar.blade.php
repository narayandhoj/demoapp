@if(Auth::check())
    <!-- Main sidebar -->
    <div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

        <!-- Sidebar mobile toggler -->
        <div class="sidebar-mobile-toggler text-center">
            <a href="#" class="sidebar-mobile-main-toggle">
                <i class="icon-arrow-left8"></i>
            </a>
            Navigation
            <a href="#" class="sidebar-mobile-expand">
                <i class="icon-screen-full"></i>
                <i class="icon-screen-normal"></i>
            </a>
        </div>
        <!-- /sidebar mobile toggler -->

        <!-- Sidebar content -->
        <div class="sidebar-content">

            <!-- Main navigation -->
            <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                    <!-- Main -->
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <span>
                                Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('images') }}" class="nav-link">Manage Images</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pdf.index') }}" class="nav-link" target="_blank">Download Pdf</a>
                    </li>
                </ul>
            </div>
            <!-- /main navigation -->

        </div>
        <!-- /sidebar content -->
        
    </div>
    <!-- /main sidebar -->
@endif