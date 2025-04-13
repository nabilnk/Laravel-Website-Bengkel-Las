<style>
    #login {
        background-color: #7e7778;
        color: #ffffff;
        border-radius: 10px;
    }
</style>
<nav class="navbar justify-content-end shadow p-3 mb-5 bg-light rounded fixed-top" >
    <div class="container-fluid">
        <a class="navbar-brand" href="img/logo.png">
          <img src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="50" class="d-inline-block align-text-top">            
        </a>
        <div class="navbar" id="navbar">            
            <ul class="nav d-flex align-items-center ">
              <!-- Current: "bg-gray-900 text-whitpe", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <li class="nav-item">
                  <a class="nav-link" style="color:black" href="#hero-section" >Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color:black" href="#profile">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" style="color:black" href="#produk">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:black" href="{{ route('services') }}">Service</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="color:black" href="#contact">Contact</a>
                </li>
                @auth
                <button class="btn" id="toggleSidebar">
                    <img src="{{ asset('img/akun.jpg') }}" width=40 alt="">
                </button>
                <div id="sidebar">
                    <div class="p-3 shadow d-flex justify-content-between" >
                        <p class="text-muted" style="color: black !important; margin-bottom:5px !important; margin-top: 25px ">Welcome {{ Auth::user()->name }}!</p>
                        <button class="btn" id="close" style="padding: 0 !important; margin-bottom: 25px;"><i class="bi bi-x"></i></button>
                    </div>
                    <ul class="nav flex-column" >
                        <li class="nav-item">
                            <a class="nav-link" style="color:black" href="{{ route('user.edit', ['id' => Auth::user()->id]) }}">Profile Edit</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('order') }}" class="nav-link" style="color:black" href="#">Your Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color:black" href="{{ route('transaksi.index.user') }}">Transaction</a>
                        </li>
                        <li class="nav-item d-flex justify-content-start" style="margin-left: 1rem;">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="overlay" id="overlay"></div>
                @else
                <a href="{{ route('user.login') }}" class="btn btn-custom animate__animated animate__zoomIn" id="login">LOGIN</a>  
                @endauth
            </ul>
        </div>
      </div>
</nav>
<script>
    const toggleSidebar = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const close = document.getElementById('close');

    // Toggle sidebar and overlay
    toggleSidebar.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    // Close sidebar when clicking outside (overlay)
    close.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });
</script>
{{-- // Add active class based on hash fragment
window.addEventListener('hashchange', function() {
    const links = document.querySelectorAll('.nav-link');
    links.forEach(link => {
        if (link.getAttribute('href') === window.location.hash) {
            link.classList.add('bg-gray-900', 'text-white');
            link.classList.remove('text-gray-300', 'hover:bg-gray-700', 'hover:text-white');
        } else {
            link.classList.remove('bg-gray-900', 'text-white');
            link.classList.add('text-gray-300', 'hover:bg-gray-700', 'hover:text-white');
        }
    });
});

// Trigger the hashchange event on page load
window.dispatchEvent(new Event('hashchange')); --}}
