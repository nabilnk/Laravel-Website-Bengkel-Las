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
    {{-- navbar dan sidebar --}}
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

    {{-- produk detail section --}}
    <section class="detailproduk" style="padding: 25rem;">
        <div class="row">
            <h2 style="text-align: center">Detail Produk</h2>
            <div class="col d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('storage/images/'. $product->modelproduct->product_image) }}" style="width:351px; height:440px; border-radius:25px; ">
                <h5 style="text-align: center; margin-top:2rem">{{ $product->modelproduct->product_name }}</h5>
            </div>
            <div class="col">
                <table class="table">
                    <thead>
                      <tr></tr>
                        <th scope="col">Dimension</th>
                        <th scope="col">Product Specification</th>
                        <th scope="col">Material</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $product->product_dimention }}</td>
                        <td>{{ $product->product_specification }}</td>
                        <td>{{ $product->product_materials }}</td>
                      </tr>
                    </tbody>
                </table>
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
</body>
</html>