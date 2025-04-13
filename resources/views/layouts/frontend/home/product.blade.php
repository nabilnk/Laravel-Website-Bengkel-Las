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

        .productimg{
            box-shadow: 10px 9px 5px 0px rgba(0,0,0,0.75);
            -webkit-box-shadow: 10px 9px 5px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 10px 5px 0px rgba(0,0,0,0.75);
        }
        .model{
            transition: transform .2s; 
        }
        .model:hover{
            transform: scale(1.2);
        }

        #login{
            background-color: #7e7778;
            color: #ffffff;
            border-radius: 10px;
        }
    </style>
</head>
<body>
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
                      <a class="nav-link" style="color:black" href="{{ route('homepage') }}"">Profile</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" style="color:black" href="{{ route('homepage') }}"">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:black" href="{{ route('homepage') }}"">Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="color:black" href="{{ route('homepage') }}"">Contact</a>
                    </li>
                    @auth
                    <button class="btn" id="toggleSidebar">
                        <img src="{{ asset('img/akun.jpg') }}" width=40 alt="">
                    </button>
                    <div id="sidebar">
                        <div class="btn d-flex justify-content-end" >
                            <button class="btn" id="close">X</button>
                        </div>
                        <div class="p-3 shadow" >
                            <p class="text-muted" style="color: black !important;">Welcome {{ Auth::user()->name }}!</p>
                            {{-- <h5>{{ Auth::user()->name }}</h5> --}}
                        </div>
                        <ul class="nav flex-column" >
                            <li class="nav-item">
                                <a class="nav-link" style="color:black" href="#">Profile Edit</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:black" href="#">Track Your Order</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:black" href="#">Order History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" style="color:black" href="#">Transaction</a>
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
    <section class="produk" style="margin-top: 10rem;">
        <div class="container p-5">
            <div class="row">
                <h1>
                    Temukan Model Favorit Anda!
                </h1>
                @foreach($products as $p)
                <div class="col d-flex flex-column align-items-center model" style="margin-top: 2rem;">
                    <!-- Gambar -->
                    <a href="{{ route('productdetail3.pdetail', ['productId' => $p->id, 'modelId' => $p->product_detail->id ?? 0]) }}">
                        <img src="{{ asset('storage/images/' . $p->product_image) }}" alt="" style="width:290px; height:268px; border-radius:25px;" class="productimg">
                        <!-- Nama Produk -->
                        <div class="text mt-3">
                            <h5 style="text-align: center;"><b>{{ $p->product_name }}</b></h5>
                        </div>
                    </a>
                </div>
                @endforeach
                <div class="col d-flex flex-column align-items-center model" style="margin-top: 2rem;">
                    <!-- Gambar -->
                    <a href="{{ route('services') }}" style="text-decoration: none !important; color: black !important;">
                        <img src="{{ asset('img/customlogo.png') }}" alt="" style="width:290px; height:268px; border-radius:25px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <div class="text mt-3">
                            <h5 style="text-align: center;"><b>Custom</b></h5>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
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

    @include('layouts.frontend.home.footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>