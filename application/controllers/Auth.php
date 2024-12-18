<?php
// Pastikan bahwa file ini diakses melalui framework CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Mendefinisikan controller Auth yang mewarisi CI_Controller
class Auth extends CI_Controller {
    // Konstruktor untuk menginisialisasi controller
    public function __construct(){
        // Memanggil konstruktor parent
        parent::__construct();
    }
    
    // Metode default yang memuat halaman login
    public function index()
    {
        // Memuat view 'login'
        $this->load->view('login');
    }
    public function register() {
        $this->load->view('register');
    }

    // Metode untuk melakukan proses login
    public function login()
    {
        // Mengambil data username dari input POST
        $username = $this->input->post('username');
        // Mengambil dan mengenkripsi password menggunakan MD5
        $password = md5($this->input->post('password'));
        
        // Kuery untuk memeriksa keberadaan pengguna di tabel 'user'
        $this->db->from('user');
        $this->db->where('username', $username); // Memfilter berdasarkan username
        $cek = $this->db->get()->row(); // Mengambil baris pertama dari hasil kuery

        // Memeriksa apakah pengguna tidak ditemukan
        if ($cek == NULL) {
            // Menyiapkan pesan alert jika username tidak ada
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Username tidak ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            // Mengarahkan kembali ke halaman login
            redirect('auth');
        } 
        // Memeriksa apakah password yang dimasukkan cocok dengan password di database
        else if ($password == $cek->password) {
            // Menyiapkan data pengguna untuk disimpan di session
            $data = array(
                'id_user'   => $cek->id_user, // ID pengguna
                'nama'      => $cek->nama, // Nama pengguna
                'username'  => $cek->username, // Username
                'level'     => $cek->level, // Level akses pengguna
            );
            // Menyimpan data pengguna ke dalam session
            $this->session->set_userdata($data);
            // Mengarahkan pengguna ke halaman admin/home
            redirect('admin/home');
        } 
        // Jika password tidak cocok
        else {
            // Menyiapkan pesan alert jika password salah
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Password salah.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            // Mengarahkan kembali ke halaman login
            redirect('auth');
        }
    }

    // Metode untuk melakukan logout
    public function logout()
    {
        // Menghancurkan session pengguna
        $this->session->sess_destroy();
        // Mengarahkan kembali ke halaman utama
        redirect('home');
    }
    public function simpan_user(){
        $data = array(
            'nama' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level' => "kontributor"
        );
        $this->db->insert('user',$data);
        redirect('auth');
    }
}
