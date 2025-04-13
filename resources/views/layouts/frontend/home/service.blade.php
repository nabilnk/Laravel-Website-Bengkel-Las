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
    
    {{-- Navbar dan Sidebar --}}
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
                        <a class="nav-link {{ ($active === 'Service') ? 'active2' : ' ' }}" style="color:black" href="{{ route('services') }}">Service</a>
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

    {{-- Content --}}
    <section class="konsul" style="margin-top: 10rem;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-left">Konsultasi Bingung memilih model dan bahan produk?
                        Konsultasikan sekarang ke admin Kana Jaya!</h1>
                    <p class="text-left">Kami siap membantu anda dalam memberikan konsultasi gratis</p>
                    <a href="https://wa.me/6282328591635" class="btn bg-dark text-white p-3" style="border-radius:15px;">Konsultasi Sekarang</a>
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
                    <h1 class="text-left">Konsultasi Bingung memilih model dan bahan produk?
                        Konsultasikan sekarang ke admin Kana Jaya!</h1>
                    <p class="text-left">Kami siap membantu anda dalam memberikan konsultasi gratis</p>
                    <a href="" class="btn bg-dark text-white p-3" style="border-radius:15px;" data-bs-toggle="modal" data-bs-target="#exampleModal">Custom Order</a>
                </div>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          @auth
                          <div class="modal-header d-flex justify-content-between align-items-center">
                            <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">Form Kastemisasi</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
                        </div> 
                             <div class="modal-body">
                            <form action="{{ route('customorder.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form group">
                                    <input type="text" class="form-control" name="user_id" id="user_id" value="{{ Auth::user()->id }}" hidden>  
                                    <label for="jenis_produk">Jenis Produk</label>
                                    <input type="text" class="form-control" name="jenis_produk" id="jenis_produk" placeholder="Masukkan jenis produk" required>
                                    
                                    <label for="model_produk">Model Produk</label>
                                    <input type="text" class="form-control" name="model_produk" id="model_produk" placeholder="Masukkan model produk" required>
                                    
                                    <label for="spesifikasi_produk">Spesifikasi Produk</label>
                                    <input type="text" class="form-control" name="spesifikasi_produk" id="spesifikasi_produk" placeholder="Masukkan spesifikasi produk" required>
                                    
                                    <label for="dimensi_produk">Dimensi Produk (cm)</label>
                                    <div class="d-flex">
                                        <div class="row">
                                            <div class="col">
                                                <input type="number" class="form-control" name="dimensi_produk" id="dimensi_produk" placeholder="Panjang">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" name="dimensi_produk" id="dimensi_produk" placeholder="Lebar">
                                            </div>
                                            <div class="col">
                                                <input type="number" class="form-control" name="dimensi_produk" id="dimensi_produk" placeholder="Tinggi">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <label for="bahan_produk">Bahan Produk</label>
                                    <input type="text" class="form-control" name="bahan_produk" id="bahan_produk" placeholder="Masukkan bahan produk" required>
                                    
                                    <label for="gambarsampel_produk">Gambar Sampel Produk</label>
                                    <input type="file" class="form-control" name="gambarsampel_produk" id="gambarsampel_produk" placeholder="Masukkan gambar sampel produk" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Place Order</button>
                              <a href="{{ route('customorder.create') }}" class="btn btn-primary">Back</a>
                            </div>
                            @else
                            <div class="modal-header d-flex justify-content-between align-items-center">
                                <h1 class="modal-title fs-5 mx-auto" id="exampleModalLabel">Login terlebih dahulu untuk melakukan custom order</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <p>Silakan <a href="{{ route('user.login') }}">login</a> untuk mengakses form kastemisasi.</p>
                            </div>
                            @endauth                    
                        </form>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.frontend.home.footer')
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
        
        const navItems = document.querySelectorAll('.nav-link');
        navItems.forEach(item => {
            item.addEventListener('click', function () {
                navItems.forEach(nav => nav.classList.remove('active2'));
                this.classList.add('active2');
            });
        });
        
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>