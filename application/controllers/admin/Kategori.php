<?php
// Memastikan file ini diakses melalui framework CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Mendefinisikan controller Kategori yang mewarisi CI_Controller
class Kategori extends CI_Controller {
    // Konstruktor untuk menginisialisasi controller
    public function __construct(){
        // Memanggil konstruktor parent
        parent::__construct();
        // Memeriksa apakah level pengguna di session tidak ada; jika tidak, arahkan ke halaman auth
        if($this->session->userdata('level') == NULL){
            redirect('auth'); // Arahkan pengguna ke halaman autentikasi
        }
    }

    // Metode default untuk menampilkan halaman kategori
	public function index()
	{
        // Kuery untuk mengambil data dari tabel 'kategori'
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC'); // Mengurutkan kategori berdasarkan nama
        $kategori = $this->db->get()->result_array(); // Mengambil semua kategori dalam bentuk array

        // Menyiapkan data untuk diteruskan ke view
		$data = array(
			'judul_halaman' => 'Kategori Konten', // Judul halaman
            'kategori'      => $kategori // Data kategori
		);

        // Memuat template admin dan view 'kategori_index' dengan data yang telah disiapkan
		$this->template->load('template_admin', 'admin/kategori_index', $data);
	}

    // Metode untuk menyimpan kategori baru
    public function simpan()
    {
        // Kuery untuk memeriksa apakah kategori sudah ada
        $this->db->from('kategori');
        $this->db->where('nama_kategori', $this->input->post('nama_kategori'));
        $cek = $this->db->get()->result_array(); // Mengambil hasil pencarian kategori

        // Jika kategori sudah ada
        if($cek <> NULL){
            // Menyiapkan pesan alert jika kategori sudah digunakan
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Kategori konten sudah digunakan.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            redirect('admin/kategori'); // Arahkan kembali ke halaman kategori
        }

        // Menyiapkan data kategori yang akan disimpan
        $data = array(
            'nama_kategori' => $this->input->post('nama_kategori') // Nama kategori
        );

        // Menyimpan data kategori ke tabel 'kategori'
        $this->db->insert('kategori', $data);

        // Menyiapkan pesan alert jika berhasil menambahkan kategori
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan kategori.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');

        redirect('admin/kategori'); // Arahkan kembali ke halaman kategori
    }

    // Metode untuk menghapus kategori berdasarkan ID
    public function delete_data($id)
    {
        // Menyiapkan kondisi untuk penghapusan berdasarkan ID kategori
        $where = array(
            'id_kategori' => $id // ID kategori yang akan dihapus
        );

        // Menghapus data kategori dari tabel 'kategori'
        $this->db->delete('kategori', $where);

        // Menyiapkan pesan alert jika berhasil menghapus kategori
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus kategori.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');

        redirect('admin/kategori'); // Arahkan kembali ke halaman kategori
    }

    // Metode untuk memperbarui kategori
    public function update()
    {
        // Menyiapkan kondisi untuk pembaruan berdasarkan ID kategori
        $where = array('id_kategori' => $this->input->post('id_kategori'));

        // Menyiapkan data kategori yang akan diperbarui
        $data = array('nama_kategori' => $this->input->post('nama_kategori'));

        // Memperbarui data kategori di tabel 'kategori'
        $this->db->update('kategori', $data, $where);

        // Menyiapkan pesan alert jika berhasil memperbarui kategori
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui kategori.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');

        redirect('admin/kategori'); // Arahkan kembali ke halaman kategori
    }
}