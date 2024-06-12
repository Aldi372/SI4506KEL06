<aside id="sidebar" class="js-sidebar">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">Mitra Dashboard</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">Navigation Sidebar</li>
            <li class="sidebar-item">
                <a href="{{url('mitra/dashboard')}}" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Dashboard
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{url('menus')}}" class="sidebar-link active">
                    <i class="fa-solid fa-hamburger pe-2"></i>
                    Menu
                </a>
            </li>
            <!-- <li class="sidebar-item">
                <a href="{{url('stocks')}}" class="sidebar-link">
                    <i class="fa-solid fa-archive pe-2"></i>
                    Stock
                </a>
            </li> -->
            <li class="sidebar-item">
                <a href="{{url('orders')}}" class="sidebar-link">
                    <i class="fa-solid fa-comment-dollar pe-2"></i>
                    Pemesanan
                </a>
            </li>
            <li class="sidebar-item">
                <a href="/chatify" class="sidebar-link">
                    <i class="fa-solid fa-comment-dollar pe-2"></i>
                    Chat
                </a>
            </li>
            <a href="{{ route('ratings.index') }}" class="sidebar-link">
                <i class="fa-solid fa-star pe-2"></i>
                Rating
            </a>
            <li class="sidebar-item">
                <a href="{{ route('sales') }}" class="sidebar-link">
                    <i class="fa-solid fa-shop pe-2"></i>
                    Penjualan
                </a>
            </li>
        </ul>
    </div>
</aside>