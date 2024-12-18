<?php
// Memastikan file ini diakses melalui framework CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Mendefinisikan controller Home yang mewarisi CI_Controller
class Home extends CI_Controller {
    // Konstruktor untuk menginisialisasi controller
    public function __construct(){
        // Memanggil konstruktor parent
        parent::__construct();
        // Memeriksa apakah level pengguna di session tidak ada; jika tidak, arahkan ke halaman auth
        if($this->session->userdata('level') == NULL){
            redirect('auth'); // Arahkan pengguna ke halaman autentikasi
        }
    }

    // Metode default untuk menampilkan halaman dashboard
	public function index()
	{
        // Menyiapkan data untuk diteruskan ke view
		$data = array(
			'judul_halaman' => 'Halaman Dashboard' // Judul halaman dashboard
		);

        // Memuat template admin dan view 'dashboard' dengan data yang telah disiapkan
		$this->template->load('template_admin', 'admin/dashboard', $data);
	}
}