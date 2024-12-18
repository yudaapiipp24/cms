<?php
// Pastikan bahwa file ini diakses melalui framework CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Mendefinisikan controller Home yang mewarisi CI_Controller
class Home extends CI_Controller {
    // Konstruktor untuk menginisialisasi controller
    public function __construct(){
        // Memanggil konstruktor parent
        parent::__construct();
    }
    
    // Metode default yang memuat halaman utama
    public function index()
    {
        // Kuery untuk mendapatkan pengaturan konfigurasi dari tabel 'konfigurasi'
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mengambil baris pertama dari hasil

        // Kuery untuk mendapatkan data carousel dari tabel 'caraousel'
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mendapatkan semua kategori dari tabel 'kategori'
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mendapatkan konten, bergabung dengan tabel kategori dan user
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Bergabung dengan kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Bergabung dengan user
        $this->db->order_by('tanggal', 'ASC'); // Mengurutkan hasil berdasarkan tanggal secara ascending
        $konten = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Menyiapkan data yang akan diteruskan ke view
        $data = array(
            'judul'     =>  "Beranda | Yuda", // Judul halaman
            'konfig'    =>  $konfig, // Data konfigurasi
            'kategori'  =>  $kategori, // Data kategori
            'caraousel' =>  $caraousel, // Data carousel
            'konten'    =>  $konten, // Data konten
        );

        // Memuat view 'beranda' dan meneruskan data
        $this->load->view('beranda', $data);
    }

    // Metode untuk memuat artikel berdasarkan kategori
    public function kategori($id)
    {
        // Kuery untuk mendapatkan pengaturan konfigurasi
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mengambil baris pertama dari hasil

        // Kuery untuk mendapatkan data carousel
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mendapatkan semua kategori
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mendapatkan konten yang difilter berdasarkan ID kategori
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Bergabung dengan kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Bergabung dengan user
        $this->db->where('a.id_kategori', $id); // Memfilter berdasarkan ID kategori
        $konten = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mendapatkan nama kategori berdasarkan ID
        $this->db->from('kategori');
        $this->db->where('id_kategori', $id); // Memfilter berdasarkan ID kategori
        $nama_kategori = $this->db->get()->row()->nama_kategori; // Mengambil nama kategori

        // Menyiapkan data yang akan diteruskan ke view
        $data = array(
            'judul'         =>  $nama_kategori." | Yuda", // Judul halaman dengan nama kategori
            'nama_kategori' =>  $nama_kategori, // Nama kategori
            'konfig'       =>  $konfig, // Data konfigurasi
            'kategori'     =>  $kategori, // Data kategori
            'konten'       =>  $konten, // Data konten
        );

        // Memuat view 'kategori' dan meneruskan data
        $this->load->view('kategori', $data);
    }

    // Metode untuk memuat artikel tertentu
    public function artikel($id)
    {
        // Kuery untuk mendapatkan pengaturan konfigurasi
        $this->db->from('konfigurasi');
        $konfig = $this->db->get()->row(); // Mengambil baris pertama dari hasil

        // Kuery untuk mendapatkan semua kategori
        $this->db->from('kategori');
        $kategori = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mendapatkan artikel tertentu berdasarkan slug
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Bergabung dengan kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Bergabung dengan user
        $this->db->where('slug', $id); // Memfilter berdasarkan slug
        $konten = $this->db->get()->row(); // Mengambil baris pertama dari hasil

        // Menyiapkan data yang akan diteruskan ke view
        $data = array(
            'judul'     =>  $konten->judul." | Yuda", // Judul halaman dengan judul artikel
            'konfig'    =>  $konfig, // Data konfigurasi
            'kategori'  =>  $kategori, // Data kategori
            'konten'    =>  $konten, // Data artikel
        );

        // Memuat view 'detail' dan meneruskan data
        $this->load->view('detail', $data);
    }
}
