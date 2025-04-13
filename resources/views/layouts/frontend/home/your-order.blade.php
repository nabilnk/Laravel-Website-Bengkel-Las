<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=REM:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>KANA JAYA LAS</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/background.css') }}">

    <style>
        *{
            font-family: "REM", serif;
            font-optical-sizing: auto;
            font-style: normal;
        }
        #sidebar {
            width: 250px;
            height: 100vh;
            background: #f8f9fa;
            position: fixed;
            right: -250px;
            top: 0;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        #sidebar.active {
            right: 0;
        }
        p{
            font-size: 24px;
        }

        #login {
            background-color: #7e7778;
            color: #ffffff;
            border-radius: 10px;
        }
    </style>

</head>
<body>
    {{-- Navbar dan SIdebar --}}
    <nav class="navbar justify-content-end shadow p-3 mb-5 bg-light rounded fixed-top" >
        <div class="container-fluid">
            <a class="navbar-brand" href="img/logo.png">
              <img src="{{ asset('img/logo.png') }}" alt="Logo" width="200" height="50" class="d-inline-block align-text-top">            
            </a>
            <div class="navbar" id="nav">            
                <ul class="nav d-flex align-items-center ">
                    <li class="nav-item">
                      <a class="nav-link" style="color:black" href="{{ route('homepage') }}" >Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" style="color:black" href="{{ route('homepage') }}">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" style="color:black" href="{{ route('homepage') }}">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:black" href="{{ route('services') }}">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:black" href="{{ route('homepage') }}">Contact</a>
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
                                <a href="{{ route('order') }}" class="nav-link" style="color:black" >Your Order</a>
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

    {{-- Content --}}
    <section class="konsul" style="margin-top: 10rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-left">Segala informasi mengenai order anda bisa dicek disini</h1>
                    <p class="text-left">Jangan sampai lupa dengan order anda!</p>
                    <a href="" class="btn bg-dark text-white p-3" style="border-radius:15px;" data-bs-toggle="modal" data-bs-target="#trackOrderModal2">Order Detail</a>
                    <div class="modal fade" id="trackOrderModal2" tabindex="-1" aria-labelledby="trackOrderModalLabel2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" style="max-width: 100% !important;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5 mx-auto" id="trackOrderModalLabel">Track Order</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <article class="card">
                                        <header class="card-header"> My Orders </header>
                                        <div class="card-body d-flex justify-content-center" style="overflow-y: auto; height: 20rem;"> 
                                            @foreach($orders_list as $order)      
                                            @if($order->status == 'Diterima oleh Customer')                      
                                            <ul class="row">
                                                <li class="col-md-4">
                                                    <figure class="itemside mb-3">
                                                        <div class="aside"><img src="{{ asset('storage/images/' . $order->gambarsampel_produk) }}" class="img-sm border"></div>
                                                        <figcaption class="info align-self-center">
                                                            <p class="title">{{ $order->jenis_produk }}</p> 
                                                            <p class="title">{{ $order->model_produk }}</p> 
                                                            <p class="title">{{ $order->spesifikasi_produk }}</p>
                                                            <p class="title">{{ $order->dimensi_produk }}</p>
                                                            <p class="title">{{ $order->bahan_produk }}</p>
                                                            <span class="text-muted">{{ $order->harga_akhir }}</span>
                                                        </figcaption>
                                                    </figure>
                                                </li>
                                            </ul>
                                            <hr>
                                            @endif
                                            @endforeach
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/konsultasi.png') }}" style="width:15rem; height:15rem;" alt="">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('img/customlogo.png') }}" style="width:15rem;" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="text-left">Lacak proses orderan anda disini.</h1>
                    <p class="text-left">Apabila ada informasi pelacakan ada yang tidak sesuai bisa konfirmasi admin!</p>
                    <a href="" class="btn bg-dark text-white p-3" style="border-radius:15px;" data-bs-toggle="modal" data-bs-target="#trackOrderModal">Track Order</a>
                </div>
                <div class="modal fade" id="trackOrderModal" tabindex="-1" aria-labelledby="trackOrderModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 100% !important;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5 mx-auto" id="trackOrderModalLabel">Track Order</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <article class="card">
                                    <header class="card-header">  Tracking </header>
                                    <div class="card-body" style="overflow-y: auto; height: 20rem;">
                                        @foreach($orders_list as $order)
                                        {{-- <article class="card">
                                            <div class="card-body row">
                                                <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                                                <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                                                <div class="col"> <strong>Status:</strong> <br> Picked by the courier </div>
                                                <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                                            </div>
                                        </article> --}}
                                        @if($order->status != 'Diterima oleh Customer')
                                        <h6>Order ID: {{ $order->id_order }}</h6>
                                        <div class="track">
                                            <div class="step {{ in_array($order->status, ['pending', 'Diterima oleh Admin', 'Sedang diproses', 'Siap diantar', 'Diterima oleh Customer']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fa fa-check"></i></span>
                                                <span class="text">Pending</span>
                                            </div>
                                            <div class="step {{ in_array($order->status, ['Diterima oleh Admin', 'Sedang diproses', 'Siap diantar', 'Diterima oleh Customer']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fa fa-user"></i></span>
                                                <span class="text">Diterima oleh Admin</span>
                                            </div>
                                            <div class="step {{ in_array($order->status, ['Sedang diproses', 'Siap diantar', 'Diterima oleh Customer']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fa fa-truck"></i></span>
                                                <span class="text">Sedang diproses</span>
                                            </div>
                                            <div class="step {{ in_array($order->status, ['Siap diantar', 'Diterima oleh Customer']) ? 'active' : '' }}">
                                                <span class="icon"><i class="fa fa-box"></i></span>
                                                <span class="text">Siap diantar</span>
                                            </div>
                                            <div class="step {{ $order->status == 'Diterima oleh Customer' ? 'active' : '' }}">
                                                <span class="icon"><i class="fa fa-box"></i></span>
                                                <span class="text">Diterima oleh Customer</span>
                                            </div>
                                        </div>                                   
                                        <ul class="row d-flex justify-content-center">
                                            <li class="col-md-4">
                                                <figure class="itemside mb-3 ">
                                                    <div class="aside"><img src="{{ asset('storage/images/'. $order->gambarsampel_produk) }}" class="img-sm border w-100"></div>
                                                    <figcaption class="info align-self-center">
                                                        <p class="title">{{ $order->jenis_produk }}</p>
                                                        <p class="title">{{ $order->model_produk }}</p>
                                                        <p class="title">{{ $order->spesifikasi_produk }}</p>
                                                        <span class="text-muted">Rp. {{ $order->transaksi->harga_akhir }}</span>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                        </ul>
                                        <hr>
                                        @else
                                        @endif  
                                        @endforeach
                                    </div>
                                </article>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

       
    </section>

    @include('layouts.frontend.home.footer')
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>