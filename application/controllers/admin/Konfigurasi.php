<?php
// Memastikan file ini diakses melalui framework CodeIgniter
defined('BASEPATH') or exit('No direct script access allowed');

// Mendefinisikan controller Konfigurasi yang mewarisi CI_Controller
class Konfigurasi extends CI_Controller
{
    // Konstruktor untuk menginisialisasi controller
    public function __construct()
    {
        // Memanggil konstruktor parent
        parent::__construct();
        // Memeriksa apakah level pengguna di session tidak ada; jika tidak, arahkan ke halaman auth
        if ($this->session->userdata('level') == NULL) {
            redirect('auth'); // Arahkan pengguna ke halaman autentikasi
        }
    }

    // Metode default untuk menampilkan halaman konfigurasi
    public function index()
    {
        // Kuery untuk mengambil data dari tabel 'konfigurasi'
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mengambil satu baris data konfigurasi

        // Menyiapkan data untuk diteruskan ke view
        $data = array(
            'judul_halaman' => 'Halaman Konfigurasi', // Judul halaman
            'konfig'        => $konfig // Data konfigurasi
        );

        // Memuat template admin dan view 'konfigurasi' dengan data yang telah disiapkan
        $this->template->load('template_admin', 'admin/konfigurasi', $data);
    }

    // Metode untuk memperbarui data konfigurasi
    public function update()
    {
        // Menyiapkan kondisi untuk pembaruan berdasarkan ID konfigurasi
        $where = array('id_konfigurasi' => 1);

        // Menyiapkan data konfigurasi yang akan diperbarui
        $data = array(
            'judul_website'   => $this->input->post('judul'), // Judul website
            'profil_website'  => $this->input->post('profil_website'), // Profil website
            'facebook'        => $this->input->post('facebook'), // URL Facebook
            'instagram'       => $this->input->post('instagram'), // URL Instagram
            'email'           => $this->input->post('email'), // Email kontak
            'alamat'          => $this->input->post('alamat'), // Alamat
            'no_wa'          => $this->input->post('no_wa'), // Nomor WhatsApp
        );

        // Memperbarui data konfigurasi di tabel 'konfigurasi'
        $this->db->update('konfigurasi', $data, $where);

        // Menyiapkan pesan alert jika berhasil memperbarui konfigurasi
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui konfigurasi.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');

        // Mengarahkan kembali ke halaman konfigurasi
        redirect('admin/konfigurasi');
    }
}