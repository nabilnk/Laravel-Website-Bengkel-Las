@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        {{-- JUDUL SIDEBAR --}}
        <div class="sidebar-brand">
        <a href="">KANA JAYA LAS</a>
        </div>
        {{-- ISI SIDEBAR --}}
        <ul class="sidebar-menu">
            {{-- MENU DASHBOARD --}}
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>

            {{-- @if (Auth::user()->role == 'superadmin')
            <li class="menu-header">Hak Akses</li>
            <li class="{{ Request::is('hakakses') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('hakakses') }}"><i class="fas fa-user-shield"></i> <span>Hak Akses</span></a>
            </li>
            @endif --}}

            <!-- MENU PROFILE ADMIN-->
            {{-- <li class="menu-header">Profile</li>
            <li class="{{ Request::is('profile/edit') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/edit') }}"><i class="far fa-user"></i> <span>Profile</span></a>
            </li> --}}

            {{-- MENU GANTI PW ADMIN --}}
            {{-- <li class="{{ Request::is('profile/change-password') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('profile/change-password') }}"><i class="fas fa-key"></i> <span>Ganti Password</span></a>
            </li> --}}

            {{-- MENU MASTER DATA --}}
            <li class="menu-header">Master Data</li>
            <li class="{{ Request::is('product') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('product') }}"><i class="fa fa-newspaper"></i> <span>Products</span></a>
            </li>
            <li class="{{ Request::is('productdetail') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('productdetail') }}"><i class="fa fa-newspaper"></i> <span>Product Details</span></a>
            </li>

            {{-- MENU DATA --}}
            <li class="menu-header">Model</li>
            <li class="{{ Request::is('pagar') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pagar.index') }}"><i class="fa fa-newspaper"></i> <span>Pagar</span></a>
            </li>
            <li class="{{ Request::is('tangga') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('tangga.index') }}"><i class="fa fa-newspaper"></i> <span>Tangga</span></a>
            </li>
            <li class="{{ Request::is('kanopi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kanopi.index') }}"><i class="fa fa-newspaper"></i> <span>Kanopi</span></a>
            </li>

            {{-- MENU DATA --}}
            <li class="menu-header">Order</li>
            <li class="{{ Request::is('customorder') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('customorder.index') }}"><i class="fa fa-newspaper"></i> <span>Order Resume</span></a>
            </li>

            {{-- MENU Transaksi --}}
            <li class="menu-header">Transaksi</li>
            <li class="{{ Request::is('transaksi') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('transaksi.index') }}"><i class="fa fa-newspaper"></i> <span>Transaction</span></a>
            </li>
             

            {{-- <li class="menu-header">Examples</li>
            <li class="{{ Request::is('table-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('table-example') }}"><i class="fas fa-table"></i> <span>Table Example</span></a>
            </li>
            <li class="{{ Request::is('clock-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('clock-example') }}"><i class="fas fa-clock"></i> <span>Clock Example</span></a>
            </li>
            <li class="{{ Request::is('chart-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('chart-example') }}"><i class="fas fa-chart-bar"></i> <span>Chart Example</span></a>
            </li>
            <li class="{{ Request::is('form-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('form-example') }}"><i class="fas fa-file-alt"></i> <span>Form Example</span></a>
            </li>
            <li class="{{ Request::is('map-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('map-example') }}"><i class="fas fa-map"></i> <span>Map Example</span></a>
            </li>
            <li class="{{ Request::is('calendar-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('calendar-example') }}"><i class="fas fa-calendar"></i> <span>Calendar Example</span></a>
            </li>
            <li class="{{ Request::is('gallery-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('gallery-example') }}"><i class="fas fa-images"></i> <span>Gallery Example</span></a>
            </li>
            <li class="{{ Request::is('todo-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('todo-example') }}"><i class="fas fa-list"></i> <span>Todo Example</span></a>
            </li>
            <li class="{{ Request::is('contact-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('contact-example') }}"><i class="fas fa-envelope"></i> <span>Contact Example</span></a>
            </li>
            <li class="{{ Request::is('faq-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('faq-example') }}"><i class="fas fa-question-circle"></i> <span>FAQ Example</span></a>
            </li>
            <li class="{{ Request::is('news-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('news-example') }}"><i class="fas fa-newspaper"></i> <span>News Example</span></a>
            </li>
            <li class="{{ Request::is('about-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('about-example') }}"><i class="fas fa-info-circle"></i> <span>About Example</span></a>
            </li>
        </ul> --}}
    </aside>
</div>
@endauth
