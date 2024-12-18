<style>
    *{
        scroll-behavior: smooth;
    }
</style>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS | YUDAAPIIPP</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend/'); ?>css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__option">
            <div class="offcanvas__links">
                <a href="#">Sign in</a>
                <a href="#">FAQs</a>
            </div>
            <div class="offcanvas__top__hover">
                <span>Usd <i class="arrow_carrot-down"></i></span>
                <ul>
                    <li>USD</li>
                    <li>EUR</li>
                    <li>USD</li>
                </ul>
            </div>
        </div>
        <div class="offcanvas__nav__option">
            <a href="#" class="search-switch"><img src="img/icon/search.png" alt=""></a>
            <a href="#"><img src="img/icon/heart.png" alt=""></a>
            <a href="#"><img src="img/icon/cart.png" alt=""> <span>0</span></a>
            <div class="price">$0.00</div>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>Free shipping, 30-day return or refund guarantee.</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 40px">
                            <span style="color: black;"><?= $konfig->judul_website; ?></span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6" style="margin-top: 25px;">
                    <nav class="header__menu mobile-menu">    
                        <ul>
                            <li class="active"><a href="<?= base_url() ?>">Home</a></li>
                            <li><a href="#konten">News</a></li>
                            <li><a href="">Kategori v</a>
                                <ul class="dropdown">
                                    <li>
                                        <?php foreach ($kategori as $kate) { ?>
                                            <a href="<?= base_url('home/kategori/' . $kate['id_kategori']) ?>">
                                                <?= $kate['nama_kategori'] ?>
                                            </a>
                                        <?php } ?>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#footer">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest spad">
        <div class="container" id="konten" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title"><br>
                        <span>Latest News</span>
                        <h2>Articles from Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row pb-3"> <!-- Baris untuk konten blog -->
                <?php foreach ($konten as $uu) { ?> <!-- Loop untuk menampilkan artikel -->
                    <div class="col-lg-4 mb-4"> <!-- Kolom untuk artikel -->
                        <div class="card border-0 shadow-sm mb-2"> <!-- Kartu artikel -->
                            <img class="card-img-top mb-2" src="<?= base_url('assets/upload/konten/' . $uu['foto']) ?>" /> <!-- Gambar artikel -->
                            <div class="card-body bg-light text-center p-4"> <!-- Body kartu dengan background terang -->
                                <h4 class=""><?= $uu['judul'] ?></h4> <!-- Judul artikel -->
                                <div class="d-flex justify-content-center mb-3"> <!-- Baris untuk informasi tambahan -->
                                    <small class="mr-3"><i class="fa fa-user text-primary"></i> <?= $uu['nama'] ?></small> <!-- Penulis artikel -->
                                    <small class="mr-3"><i class="fa fa-folder text-primary"></i> <?= $uu['nama_kategori'] ?></small> <!-- Kategori artikel -->
                                </div><br>
                                <div class="blog__item">
                                        <div class="blog__item__text">
                                            <a href="<?= base_url('home/artikel/' . $uu['slug']) ?>">Read More</a>
                                        </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </section>
    <!-- Latest Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="container" id="footer">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="col-lg-3 col-md-3">
                            <div class="header__logo">
                                <a href="" class="font-weight-bold text-secondary" style="font-size: 40px">
                                    <span style="color: white;"><?= $konfig->judul_website; ?></span>
                                </a>
                            </div>
                        </div>
                        <p><?= $konfig->profil_website; ?></p>
                            <a href="#"><i class="fa fa-facebook" style="width: 38px; height: 38px"></i></a>
                            <a href="#"><i class="fa fa-twitter" style="width: 38px; height: 38px"></i></a>
                            <a href="#"><i class="fa fa-pinterest" style="width: 38px; height: 38px"></i></a>
                            <a href="#"><i class="fa fa-instagram" style="width: 38px; height: 38px"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1 col-md-3 col-sm-6" style="margin-top: 50px;">
                    <div class="footer__widget">
                        <h6>Contact Us</h6>
                            <div class="d-flex"> <!-- Baris untuk alamat -->
                                <h4 class="fa fa-map-marker"></h4> <!-- Ikon lokasi -->
                                <div class="pl-3"> <!-- Kontainer untuk teks alamat -->
                                    <h5 class="text-white">Alamat</h5> <!-- Judul alamat -->
                                    <p style="color: gray;"><?= $konfig->alamat; ?></p> <!-- Menampilkan alamat -->
                                </div>
                            </div>
                            <div class="d-flex"> <!-- Baris untuk email -->
                                <h4 class="fa fa-envelope"></h4> <!-- Ikon email -->
                                <div class="pl-3"> <!-- Kontainer untuk teks email -->
                                    <h5 class="text-white">Email</h5> <!-- Judul email -->
                                    <p style="color: gray;"><?= $konfig->email; ?></p> <!-- Menampilkan email -->
                                </div>
                            </div>
                            <div class="d-flex"> <!-- Baris untuk nomor telepon -->
                                <h4 class="fa fa-phone"></h4> <!-- Ikon telepon -->
                                <div class="pl-3"> <!-- Kontainer untuk teks nomor telepon -->
                                    <h5 class="text-white">Telepon</h5> <!-- Judul telepon -->
                                    <p style="color: gray;"><?= $konfig->no_wa; ?></p> <!-- Menampilkan nomor telepon -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="footer__copyright__text">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        <p>Copyright ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            All rights reserved | This CMS is made with <i class="fa fa-heart-o"
                            aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">YUDAAPIIPP</a>
                        </p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= base_url('assets/frontend/'); ?>js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/jquery.nice-select.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/jquery.countdown.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/jquery.slicknav.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/mixitup.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/owl.carousel.min.js"></script>
    <script src="<?= base_url('assets/frontend/'); ?>js/main.js"></script>
</body>

</html>