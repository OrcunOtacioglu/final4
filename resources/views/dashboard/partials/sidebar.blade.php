<div class="site-menubar">
    <div class="site-menubar-header">
        <div class="cover overlay">
            <img class="cover-image" src="{{ asset('admin/img/dashboard-header.jpg') }}" alt="...">
            <div class="overlay-panel vertical-align overlay-background">
                <div class="vertical-align-middle">
                    <a class="avatar avatar-lg" href="javascript:void(0)">
                        <img src="{{ asset('admin/img/avatar.png') }}" alt="">
                    </a>
                    <div class="site-menubar-info">
                        <h5 class="site-menubar-user">Dovakhin</h5>
                        <p class="site-menubar-email">orcun.otacioglu@acikgise.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="site-menubar-body scrollable scrollable-vertical">
        <div class="scrollable-container">
            <div class="scrollable-content">
                <ul class="site-menu" data-plugin="menu">
                    <li class="site-menu-item">
                        <a href="{{ url('/dashboard') }}">
                            <i class="site-menu-icon wb-dashboard" aria-hidden="true"></i>
                            <span class="site-menu-title">Dashboard</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>