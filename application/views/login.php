<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="<?= site_url('assets/sneat/') ?>/assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" /> <!-- Menentukan karakter encoding sebagai UTF-8 -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Login</title> <!-- Judul halaman login -->

  <meta name="description" content="" /> <!-- Deskripsi untuk SEO (kosong) -->

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= site_url('assets/sneat/') ?>/assets/img/favicon/favicon.ico" /> <!-- Ikon favicon untuk tab browser -->

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" /> <!-- Menghubungkan ke Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> <!-- Menghubungkan dengan cross-origin untuk Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat/') ?>/assets/vendor/fonts/boxicons.css" /> <!-- Memuat ikon dari Boxicons -->

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat/') ?>/assets/vendor/css/core.css" class="template-customizer-core-css" /> <!-- Memuat CSS inti untuk tema -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat/') ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> <!-- Memuat CSS tema default -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat/') ?>/assets/css/demo.css" /> <!-- Memuat CSS untuk demo -->

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat/') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> <!-- Memuat CSS untuk scrollbar yang sempurna -->

  <!-- Page CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat/') ?>/assets/vendor/css/pages/page-auth.css" /> <!-- Memuat CSS untuk halaman otentikasi -->

  <!-- Helpers -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/vendor/js/helpers.js"></script> <!-- Memuat helper JavaScript -->

  <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/js/config.js"></script> <!-- Memuat konfigurasi tema -->
</head>

<body>
  <!-- Content -->

  <div class="container-xxl"> <!-- Container untuk seluruh halaman -->
    <div class="authentication-wrapper authentication-basic container-p-y"> <!-- Wrapper untuk halaman otentikasi -->
      <div class="authentication-inner"> <!-- Inner container untuk otentikasi -->
        <!-- Register -->
        <div class="card"> <!-- Kartu untuk tampilan login -->
          <div class="card-body"> <!-- Badan kartu -->
            <h4 class="mb-2">Welcome to CMS! </h4> <!-- Judul selamat datang -->
            <form class="mb-3" action="<?= base_url('auth/login') ?>" method="POST"> <!-- Form untuk login -->
              <div class="mb-3"> <!-- Kontainer untuk input username -->
                <label for="email" class="form-label">Username</label> <!-- Label untuk input username -->
                <input type="text" class="form-control" name="username" placeholder="Enter your username" autofocus />
              </div>
              <div class="mb-3 form-password-toggle"> <!-- Kontainer untuk input password -->
                <div class="d-flex justify-content-between"> <!-- Baris untuk label password -->
                  <label class="form-label" for="password">Password</label> <!-- Label untuk input password -->
                </div>
                <div class="input-group input-group-merge"> <!-- Group input untuk password -->
                  <input type="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> <!-- Ikon untuk menyembunyikan/show password -->
                </div>
              </div>
              <div class="mb-3"> <!-- Kontainer untuk tombol login -->
                <button class="btn btn-primary d-grid w-100" type="submit">Login</button> <!-- Tombol untuk mengirim form login -->
              </div>
              <a class="btn btn-primary d-grid w-100" href="auth/register">Buat Akun</a>
              <div id="ngilang"> <!-- Kontainer untuk alert pesan -->
                <?= $this->session->flashdata('alert') ?> <!-- Menampilkan alert dari session -->
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>

  <!-- / Content -->


  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/vendor/libs/jquery/jquery.js"></script> <!-- Memuat jQuery -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/vendor/libs/popper/popper.js"></script> <!-- Memuat Popper.js untuk penempatan elemen -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/vendor/js/bootstrap.js"></script> <!-- Memuat Bootstrap JS -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> <!-- Memuat scrollbar yang sempurna -->

  <script src="<?= site_url('assets/sneat/') ?>/assets/vendor/js/menu.js"></script> <!-- Memuat script menu -->
  <!-- endbuild -->

  <!-- Vendors JS -->

  <!-- Main JS -->
  <script src="<?= site_url('assets/sneat/') ?>/assets/js/main.js"></script> <!-- Memuat script utama -->

  <!-- Page JS -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script> <!-- Memuat script untuk tombol GitHub -->
</body>

</html>