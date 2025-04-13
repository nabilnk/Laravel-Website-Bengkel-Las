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
        
        .dropdown-menu {
            background-color: #14213D; /* Warna navy untuk dropdown */
            color: white;
            border-radius: 10px;
            padding: 15px;
            width: 100%;
        }
        .dropdown-item {
            color: white;
        }
       
        .payment-info {
            background-color: white;
            color: black;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
        }
        .btn-primary {
            background-color: #FCA311; /* Warna tombol oranye */
            border: none;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #e89d0b;
        }
    </style>
</head>
<body>
    {{-- NAVBAR DAN SIDEBAR --}}
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
    <section class="py-5">
        <div class="container">
            <h3 class="text-center mb-5" style="font-weight: bold; margin-top:4rem !Important">Transaksi</h3>
            <div class="row g-4">
                <!-- Dropdown 1 -->
                @if($orders)
                @foreach ($orders as $order)
                <div class="col-md-6">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ID Order {{ $order->id_order }}
                        </button>
                        <ul class="dropdown-menu w-100" >
                            <li class="dropdown-item">
                                <strong>Pemesanan:</strong> <span style="text-color:white !important">{{ $order->jenis_produk }}</span>
                            </li>
                            <li class="dropdown-item">
                                <strong>Order Detail:</strong> 
                                <br>
                                <span>- {{ $order->model_produk }} </span>
                                <br>
                                <span>- {{ $order->spesifikasi_produk }}</span>
                                <br>
                                <span>- {{ $order->dimensi_produk }}</span>
                                <br>
                                <span>- {{ $order->bahan_produk }}</span>
                            </li>
                            <li class="dropdown-item">
                                <strong>Status:</strong> <span>  {{ $order->transaksi->status_pembayaran }}</span>
                            </li>
                            <li class="dropdown-item">
                                <strong>Informasi Pembayaran:</strong>
                                <div class="mt-2">
                                    <span class="payment-info">Rp {{ $order->transaksi->informasi_pembayaran }} / Rp {{ $order->transaksi->harga_akhir }}</span>
                                </div>
                            </li>
                            <li class="dropdown-item text-center mt-3">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $order->id }}">
                                    Bayar Sekarang
                                </button>
                                <!-- Modal -->
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="modal fade" id="exampleModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $order->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" style="color: black !important" id="exampleModalLabel">{{ $order->id_order }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('transaksi.update2', ['id' => $order->transaksi->id]) }}" id="form-transaksi" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="status_pembayaran" value="{{ old('status_pembayaran', $order->transaksi->status_pembayaran) }}" hidden>
                                <input type="text" name="informasi_pembayaran" value="{{ old('informasi_pembayaran', $order->transaksi->informasi_pembayaran) }}" hidden>
                                <input type="text" name="harga_akhir" value="{{ old('harga_akhir', $order->transaksi->harga_akhir) }}" hidden>
                                <input type="text" name="validasi" value="{{ old('validasi', $order->transaksi->validasi) }}" hidden>
                                <li class="dropdown-item">
                                    <strong style="color: black !important">Metode Pembayaran:</strong>
                                    <select name="metode_pembayaran" id="metodePembayaran{{ $order->transaksi->id }}" style="color: black !important" required>
                                        <option value="">
                                            <img src="" alt="">
                                            
                                        </option>
                                        <option value="BCA">
                                            <img src="" alt="">
                                            BCA
                                        </option>
                                        <option value="BNI">
                                            <img src="" alt="">
                                            BNI
                                        </option>
                                    </select>
                                </li>
                                <li class="dropdown-item">
                                    <strong style="color: black !important">Langkah Pembayaran:</strong>
                                    <ol style="color: black !important" id="langkahPembayaran{{ $order->transaksi->id }}"></ol>
                                </li>
                                <li class="dropdown-item">
                                    <strong style="color: black !important">Upload Bukti Pembayaran:</strong>
                                    <input type="file" name="bukti_pembayaran" class="form-control" required>
                                </li>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" id="konfirmasipembayaran{{ $order->transaksi->id }}">Konfirmasi Pembayaran</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const metodePembayaranSelect = document.getElementById('metodePembayaran{{ $order->transaksi->id }}');
                        const langkahPembayaran = document.getElementById('langkahPembayaran{{ $order->transaksi->id }}');
                
                        if (metodePembayaranSelect) {
                            metodePembayaranSelect.addEventListener('change', function() {
                                langkahPembayaran.innerHTML = '';  // Reset list
                
                                if (this.value === 'BCA') {
                                    langkahPembayaran.innerHTML = `
                                        <li>Transfer ke rekening BCA yang tertera</li>
                                        <li>Upload bukti pembayaran</li>
                                        <li>Tunggu konfirmasi dari admin</li>
                                    `;
                                } else if (this.value === 'BNI') {
                                    langkahPembayaran.innerHTML = `
                                        <li>Transfer ke rekening BNI yang tertera</li>
                                        <li>Upload bukti pembayaran</li>
                                        <li>Tunggu konfirmasi dari admin</li>
                                    `;
                                }
                            });
                        }
                    });
                    </script>
                    <script>
                        document.getElementById('konfirmasipembayaran{{ $order->transaksi->id }}').addEventListener('click', function() {
                            alert('Pembayaran berhasil dikonfirmasi! Silahkan Hubungi Admin untuk informasi lebih lanjut.');
                            const form = document.getElementById('form-transaksi');
                            form.submit();
                        });
                    </script>
                @endforeach
                @else
                <div class="col-12 text-center">
                    <p class="text-muted">Belum ada order.</p>
                </div>
                @endif
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>