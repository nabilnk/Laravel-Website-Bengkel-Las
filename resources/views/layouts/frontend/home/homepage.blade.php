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
            box-sizing: border-box;
            margin: 0;
        }
        body{
            margin: 0 !important;
            overflow-x: hidden;
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
            -moz-box-shadow: 10px 9px 5px 0px rgba(0,0,0,0.75);
        }
        .model{
            transition: transform .2s; 
        }
        .model:hover{
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    {{-- NAVBAR --}}
    @include('layouts.frontend.home.navbar')
    {{-- title section --}}
    <section class="hero-section" id="hero-section" style="margin-top: 5rem; padding-top:10rem !important;">
        <div class="container">
            <h1>Solusi Terbaik untuk Kustomisasi <br>dan Pemesanan Bengkel Las Anda!</h1>
            <div class="p-5">
                <a href="#" class="btn" id="view">View More</a>
                <a href="#" class="btn" id="shop">Shop</a>
            </div>
        </div>
        <div class="container">
            <div class="row g-4">
                <!-- Custom -->
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-tools"></i>
                        <h5 class="fw-bold">Custom</h5>
                        <p>Menawarkan layanan las yang <br>dapat di-custom sesuai <br>kebutuhan Anda. Menggunakan <br>ide-ide kreatif Anda dengan hasil<br>yang terbaik.</p>
                    </div>
                </div>
                <!-- Fixed Price -->
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-cash-stack"></i>
                        <h5 class="fw-bold">Fixed Price</h5>
                        <p>Nikmati kualitas tinggi <br> dengan harga yang <br>bersahabat.</p>
                    </div>
                </div>
                <!-- Satisfaction -->
                <div class="col-md-4">
                    <div class="feature-box">
                        <i class="bi bi-emoji-smile"></i>
                        <h5 class="fw-bold">100% Satisfaction</h5>
                        <p>Dengan pengalaman dan <br>keahlian yang telah terbukti, <br>Anda dapat mempercayakan <br>proyek las Anda kepada kami.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- profile --}}
    <section class="profile" style="padding-top:10rem" id="profile">
        <div class="container" style="">
            <div class="d-flex">
                <div class="row">
                    <div class="col">
                        <h3><b>Selamat datang di Kana Jaya, 
                            tempat barang impian Anda menjadi kenyataan 
                            melalui keahlian las custom kami.</b></h3>
                        <p>
                            Dengan pengalaman bertahun-tahun di bidang pengelasan, tim profesional kami siap membantu Anda untuk merancang dan membuat barang-barang custom, sesuai keinginan Anda.
                        </p>
                        <p>
                            Kami melayani berbagai permintaan mulai dari perabotan rumah tangga, dekorasi, hingga kebutuhan industri. Kualitas dan kepuasan pelanggan adalah prioritas utama kami, dan kami berkomitmen untuk memberikan hasil yang sesuai dengan standar tertinggi.
                        </p>
                        <p>
                            Mari kita ciptakan sesuatu yang luar biasa bersama! Hubungi kami hari ini untuk konsultasi dan mulailah mewujudkan proyek custom Anda.
                        </p>
                    </div>
                    <div class="d-flex col justify-content-end">
                        <img src="{{ asset('img/laptop.png') }}" alt="" class="imglaptop" style="width:30rem">
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- produk --}}
    <section class="produk" style="margin-top: 10rem; margin-bottom: 20rem; padding-top:8rem; height:60vh;" id="produk">
        <div class="container p-5">
            <div class="row">
                <h1>
                    Temukan Model Favorit Anda!
                </h1>
                @foreach($products as $product)
                <div class="col d-flex flex-column align-items-center model" style="margin-top: 7rem;">
                    <!-- Gambar -->
                    <a href="{{ route('productdetail2.index', ['productId' => $product->id]) }}">
                        <img src="{{ asset('storage/images/' . $product->product_image) }}" alt="" style="width:290px; height:268px; border-radius:25px;" class="productimg">
                    </a>
                    <!-- Nama Produk -->
                    <div class="text mt-3">
                        <h5 style="text-align: center; "><b>{{ $product->product_name }}</b></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- contact --}}
    <section class="contact" style="margin-top: 10rem; margin-bottom: 10rem; padding-top: 14rem" id="contact">
        <h2 style="text-align: center; margin-bottom: 7rem !important">Contact Us!</h2>
        <div class="row" style="margin-bottom: 10rem !important; ">
            <div class="col d-flex flex-column align-items-center model">
                <a href="https://www.instagram.com/naabilnk" target="_blank">
                    <img src="{{ asset('img/instagram.png') }}" alt="" style="width:15rem;">
                </a>
                <h4>DM Us!</h4>
            </div>
            <div class="col d-flex flex-column align-items-center model">
                <a href="https://wa.me/+6282328591635" target="_blank">
                    <img src="{{ asset('img/whatsapp.png') }}" alt="" style="width:15rem;">
                </a>
                <h4>Chat Us!</h4>
            </div>
            <div class="col d-flex flex-column align-items-center model">
                <a href="https://mail.google.com/mail/u/0/?fs=1&to=kanajaya69@gmail.com&tf=cm" target="_blank">
                    <img src="{{ asset('img/gmail.png') }}" alt="" style="width:15rem;">
                </a>
                <h4>Email Us!</h4>
            </div>
        </div>
    </section>
    {{-- footer --}}
    
    @include('layouts.frontend.home.footer')
    
    <script>
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