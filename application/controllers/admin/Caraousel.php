<?php
// Memastikan file ini diakses melalui framework CodeIgniter
defined('BASEPATH') or exit('No direct script access allowed');

// Mendefinisikan controller Caraousel yang mewarisi CI_Controller
class Caraousel extends CI_Controller
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

    // Metode untuk menampilkan daftar caraousel
    public function index()
    {
        // Mengambil data caraousel dari tabel
        $this->db->from('caraousel');
        $caraousel = $this->db->get()->result_array(); // Mendapatkan hasil sebagai array

        // Menyiapkan data untuk diteruskan ke view
        $data = array(
            'judul_halaman' => 'Haln', // Judul halaman
            'caraousel'      => $caraousel,       // Data caraousel
        );

        // Memuat template admin dan view 'caraousel_index' dengan data yang telah disiapkan
        $this->template->load('template_admin', 'admin/caraousel_index', $data);
    }

    // Metode untuk menyimpan data caraousel baru
    public function simpan()
    {
        // Menyiapkan nama foto berdasarkan timestamp
        $namafoto = date('YmdHis') . '.jpg';

        // Konfigurasi untuk upload file
        $config['upload_path']      = 'assets/upload/caraousel';
        $config['max_size']         = 10000 * 10000; // 500Kb
        $config['file_name']        = $namafoto; // Nama file yang disimpan
        $config['allowed_types']     = '*'; // Semua jenis file diizinkan

        // Memuat library upload dengan konfigurasi yang telah ditentukan
        $this->load->library('upload', $config);

        // Memeriksa ukuran file
        if ($_FILES['foto']['size'] >= 10000 * 10000) {
            // Menyimpan pesan kesalahan jika ukuran file terlalu besar
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 Kb. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('admin/caraousel'); // Mengarahkan kembali ke halaman caraousel
        } elseif (!$this->upload->do_upload('foto')) {
            // Menyimpan pesan kesalahan jika upload gagal
            $error = array('error' => $this->upload->display_errors());
        } else {
            // Mendapatkan data upload jika berhasil
            $data = array('upload_data' => $this->upload->data());
        }

        // Menyiapkan data untuk disimpan di tabel caraousel
        $data = array(
            'judul' => $this->input->post('judul'), // Judul dari input form
            'foto'  => $namafoto, // Nama file foto yang telah diupload
        );

        // Menyimpan data caraousel ke dalam database
        $this->db->insert('caraousel', $data);

        // Menyimpan pesan sukses ke session
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan caraousel.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');

        // Mengarahkan kembali ke halaman caraousel
        redirect('admin/caraousel');
    }

    // Metode untuk menghapus data caraousel berdasarkan ID
    public function delete_data($id)
    {
        // Menentukan path file yang akan dihapus
        $filename = FCPATH . '/assets/upload/caraousel/' . $id;
        if (file_exists($filename)) {
            // Menghapus file jika ada
            unlink("./assets/upload/caraousel/" . $id);
        }

        // Menentukan kondisi untuk menghapus data dari tabel caraousel
        $where = array(
            'foto' => $id // Menghapus berdasarkan nama file
        );

        // Menghapus data caraousel dari database
        $this->db->delete('caraousel', $where);

        // Menyimpan pesan sukses ke session
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menghapus caraousel.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');

        // Mengarahkan kembali ke halaman caraousel
        redirect('admin/caraousel');
    }
}