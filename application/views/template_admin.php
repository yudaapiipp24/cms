<!DOCTYPE html> <!-- Menentukan dokumen sebagai HTML5 -->

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->

<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="<?= site_url('assets/sneat') ?>/assets/"
  data-template="vertical-menu-template-free"> <!-- Template yang digunakan -->

<head>
  <meta charset="utf-8" /> <!-- Menentukan karakter encoding sebagai UTF-8 -->
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title><?= $judul_halaman ?></title> <!-- Judul halaman dinamis berdasarkan variabel PHP -->

  <meta name="description" content="" /> <!-- Deskripsi untuk SEO (kosong) -->

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?= site_url('assets/sneat') ?>/assets/img/favicon/favicon.ico" /> <!-- Ikon favicon untuk tab browser -->

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" /> <!-- Menghubungkan ke Google Fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> <!-- Menghubungkan dengan cross-origin untuk Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" /> <!-- Memuat font Public Sans -->

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat') ?>/assets/vendor/fonts/boxicons.css" /> <!-- Memuat ikon dari Boxicons -->

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat') ?>/assets/vendor/css/core.css" class="template-customizer-core-css" /> <!-- Memuat CSS inti untuk tema -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat') ?>/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> <!-- Memuat CSS tema default -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat') ?>/assets/css/demo.css" /> <!-- Memuat CSS untuk demo -->

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" /> <!-- Memuat CSS untuk scrollbar yang sempurna -->
  <link rel="stylesheet" href="<?= site_url('assets/sneat') ?>/assets/vendor/libs/apex-charts/apex-charts.css" /> <!-- Memuat CSS untuk grafik ApexCharts -->

  <!-- Page CSS -->

  <!-- Helpers -->
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/js/helpers.js"></script> <!-- Memuat helper JavaScript -->

  <!-- Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <script src="<?= site_url('assets/sneat') ?>/assets/js/config.js"></script> <!-- Memuat konfigurasi tema -->
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar"> <!-- Wrapper untuk layout dengan navbar -->
    <div class="layout-container"> <!-- Kontainer untuk tata letak -->

      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme"> <!-- Menu sidebar -->
        <div class="app-brand demo"> <!-- Branding aplikasi -->
          <a href="<?= base_url() ?>" class="app-brand-link"> <!-- Tautan ke halaman beranda -->
            <span class="app-brand-text demo menu-text fw-bolder ms-5">Beranda</span> <!-- Teks untuk branding -->
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none"> <!-- Tombol toggle untuk menu -->
            <i class="bx bx-chevron-left bx-sm align-middle"></i> <!-- Ikon untuk toggle -->
          </a>
        </div>

        <div class="menu-inner-shadow"></div> <!-- Bayangan di dalam menu -->

        <ul class="menu-inner py-1"> <!-- Daftar menu -->
          <!-- Dashboard -->
          <?php $menu = $this->uri->segment(2); ?> <!-- Mendapatkan segmen kedua dari URI untuk menu aktif -->
          
          <li class="menu-item <?php if ($menu == 'home') {
                                  echo "active";
                                } ?>"> <!-- Menu Dashboard -->
            <a href="<?= site_url('admin/home') ?>" class="menu-link"> <!-- Tautan ke halaman dashboard -->
              <i class="menu-icon tf-icons bx bx-home-circle"></i> <!-- Ikon untuk dashboard -->
              <div data-i18n="Analytics">Dashboard</div> <!-- Teks menu -->
            </a>
          </li>

          <li class="menu-item <?php if ($menu == 'caraousel') {
                                  echo "active";
                                } ?>"> <!-- Menu Caraousel -->
            <a href="<?= site_url('admin/caraousel') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-crown"></i> <!-- Ikon untuk caraousel -->
              <div data-i18n="Boxicons">Caraousel</div> <!-- Teks menu -->
            </a>
          </li>

          <!-- Tables -->
          <li class="menu-item <?php if ($menu == 'kategori') {
                                  echo "active";
                                } ?>"> <!-- Menu Kategori Konten -->
            <a href="<?= site_url('admin/kategori') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-table"></i> <!-- Ikon untuk kategori -->
              <div data-i18n="Tables">Kategori Konten</div> <!-- Teks menu -->
            </a>
          </li>

          <li class="menu-item <?php if ($menu == 'konten') {
                                  echo "active";
                                } ?>"> <!-- Menu Konten -->
            <a href="<?= site_url('admin/konten') ?>" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cog"></i> <!-- Ikon untuk konten -->
              <div data-i18n="Tables">Konten</div> <!-- Teks menu -->
            </a>
          </li>

          <li class="menu-item <?php if ($menu == 'user') {
                                  echo "active";
                                } ?>"> <!-- Menu User -->
            <?php if ($this->session->userdata('level') == 'Admin') { ?> <!-- Memeriksa level user -->
              <a href="<?= site_url('admin/user') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i> <!-- Ikon untuk user -->
                <div data-i18n="Tables">User</div> <!-- Teks menu -->
              </a>
            </li>
            <li class="menu-item <?php if ($menu == 'konfigurasi') {
                                    echo "active";
                                  } ?>"> <!-- Menu Konfigurasi -->
              <a href="<?= site_url('admin/konfigurasi') ?>" class="menu-link">
                <i class="menu-icon tf-icons bx bx-edit"></i> <!-- Ikon untuk konfigurasi -->
                <div data-i18n="Tables">Konfigurasi</div> <!-- Teks menu -->
              </a>
            </li>
          <?php } ?>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page"> <!-- Kontainer untuk halaman -->
        <!-- Navbar -->
        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar"> <!-- Navbar untuk bagian atas -->
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none"> <!-- Tombol toggle untuk navbar -->
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i> <!-- Ikon menu -->
            </a>
          </div>
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse"> <!-- Kontainer untuk navigasi kanan -->
            <ul class="navbar-nav flex-row align-items-center ms-auto"> <!-- Daftar navigasi -->
              <div class="nav-item d-flex align-items-left">
                <?= $judul_halaman ?> <!-- Menampilkan judul halaman -->
              </div>

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown"> <!-- Dropdown untuk user -->
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"> <!-- Tautan untuk dropdown -->
                  <div class="avatar avatar-online"> <!-- Avatar untuk user -->
                    <img src="<?= site_url('assets/sneat') ?>/assets/img/avatars/11.png" alt class="w-px-40 h-auto rounded-circle" /> <!-- Gambar avatar -->
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end"> <!-- Menu dropdown -->
                  <li>
                    <a class="dropdown-item" href="#">
                      <div class="d-flex"> <!-- Kontainer untuk informasi user -->
                        <div class="flex-shrink-0 me-3"> <!-- Kontainer untuk avatar -->
                          <div class="avatar avatar-online">
                            <img src="<?= site_url('assets/sneat') ?>/assets/img/avatars/11.png" alt class="w-px-40 h-auto rounded-circle" />
                          </div>
                        </div>
                        <div class="flex-grow-1"> <!-- Kontainer untuk nama dan level -->
                          <span class="fw-semibold d-block"><?= $this->session->userdata('nama'); ?></span> <!-- Menampilkan nama user -->
                          <small class="text-muted"><?= $this->session->userdata('level'); ?></small> <!-- Menampilkan level user -->
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">
                      <i class="bx bx-cog me-2"></i> <!-- Ikon untuk pengaturan -->
                      <span class="align-middle">Password</span> <!-- Teks untuk pengaturan password -->
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?= site_url('auth/logout') ?>"> <!-- Tautan untuk logout -->
                      <i class="bx bx-power-off me-2"></i> <!-- Ikon untuk logout -->
                      <span class="align-middle">Log Out</span> <!-- Teks untuk logout -->
                    </a>
                  </li>
                </ul>
              </li>
              <!--/ User -->
            </ul>
          </div>
        </nav>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper"> <!-- Wrapper untuk konten -->
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y"> <!-- Kontainer untuk konten utama -->
            <?= $contents; ?> <!-- Menampilkan konten dinamis -->
          </div>

        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme"> <!-- Footer untuk halaman -->
          <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column"> <!-- Kontainer footer -->
            <div class="mb-2 mb-md-0"> <!-- Kontainer untuk teks footer -->
              ©
              <script>
                document.write(new Date().getFullYear()); // Menampilkan tahun saat ini
              </script>
              , made with ❤️ by
              <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">yudaapiipp</a> <!-- Tautan ke pembuat tema -->
            </div>
          </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div> <!-- Latar belakang untuk konten -->
      </div>
      <!-- Content wrapper -->
    </div>
    <!-- / Layout page -->
  </div>

  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div> <!-- Overlay untuk toggle menu -->
  </div>
  <!-- / Layout wrapper -->
  
  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/libs/jquery/jquery.js"></script> <!-- Memuat jQuery -->
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/libs/popper/popper.js"></script> <!-- Memuat Popper.js -->
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/js/bootstrap.js"></script> <!-- Memuat Bootstrap -->
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script> <!-- Memuat scrollbar yang sempurna -->
  
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/js/menu.js"></script> <!-- Memuat menu JavaScript -->
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="<?= site_url('assets/sneat') ?>/assets/vendor/libs/apex-charts/apexcharts.js"></script> <!-- Memuat ApexCharts -->

  <!-- Main JS -->
  <script src="<?= site_url('assets/sneat') ?>/assets/js/main.js"></script> <!-- Memuat JavaScript utama -->

  <!-- Page JS -->
  <script src="<?= site_url('assets/sneat') ?>/assets/js/dashboards-analytics.js"></script> <!-- Memuat JavaScript untuk dashboard analitik -->

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script> <!-- Memuat script untuk tombol GitHub -->
  <script>
    $('#ngilang').delay('slow').slideDown('slow').delay(10000).slideUp(600); // Animasi untuk elemen dengan id 'ngilang'
  </script>
</body>
</html>