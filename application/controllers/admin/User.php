<?php
// Pastikan bahwa file ini diakses melalui framework CodeIgniter
defined('BASEPATH') OR exit('No direct script access allowed');

// Mendefinisikan controller User yang mewarisi CI_Controller
class User extends CI_Controller {
    // Konstruktor untuk menginisialisasi controller
    public function __construct(){
        // Memanggil konstruktor parent
        parent::__construct();
        // Memuat model User_model
        $this->load->model('User_model');
        // Memeriksa level pengguna dari session; jika bukan 'Admin', arahkan ke halaman auth
        if ($this->session->userdata('level') <> 'Admin') {
            redirect('auth');
        }
    }

    // Metode default untuk menampilkan daftar pengguna
    public function index()
    {
        // Kuery untuk mengambil data pengguna dari tabel 'user'
        $this->db->from('user');
        $this->db->order_by('nama', 'ASC'); // Mengurutkan hasil berdasarkan nama secara ascending
        $user = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Menyiapkan data untuk diteruskan ke view
        $data = array(
            'judul_halaman' => 'Data Pengguna', // Judul halaman
            'user'          => $user // Data pengguna
        );

        // Memuat template admin dan view 'user_index' dengan data yang telah disiapkan
        $this->template->load('template_admin', 'admin/user_index', $data);
    }

    // Metode untuk menyimpan data pengguna baru
    public function simpan()
    {
        // Kuery untuk memeriksa apakah username sudah ada di tabel 'user'
        $this->db->from('user');
        $this->db->where('username', $this->input->post('username')); // Memfilter berdasarkan username
        $cek = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Memeriksa jika username sudah ada
        if ($cek <> NULL) {
            // Menyiapkan pesan alert jika username sudah ada
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Username sudah ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            // Mengarahkan kembali ke halaman pengguna
            redirect('admin/user');
        }

        // Memanggil metode simpan dari User_model untuk menyimpan data pengguna
        $this->User_model->simpan();

        // Menyiapkan pesan alert jika berhasil menambahkan user
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        // Mengarahkan kembali ke halaman pengguna
        redirect('admin/user');
    }

    // Metode untuk menghapus data pengguna
    public function delete_data($id)
    {
        // Menyiapkan kondisi untuk penghapusan berdasarkan ID pengguna
        $where = array(
            'id_user' => $id // ID pengguna yang akan dihapus
        );
        
        // Menghapus data dari tabel 'user' sesuai kondisi
        $this->db->delete('user', $where);

        // Menyiapkan pesan alert jika berhasil menghapus user
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        // Mengarahkan kembali ke halaman pengguna
        redirect('admin/user');
    }

    // Metode untuk memperbarui data pengguna
    public function update()
    {
        // Memanggil metode update dari User_model untuk memperbarui data pengguna
        $this->User_model->update();

        // Menyiapkan pesan alert jika berhasil memperbarui user
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui user.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        // Mengarahkan kembali ke halaman pengguna
        redirect('admin/user');
    }
}