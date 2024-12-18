<?php
// Pastikan bahwa file ini diakses melalui framework CodeIgniter
defined('BASEPATH') or exit('No direct script access allowed');

// Mendefinisikan controller Konten yang mewarisi CI_Controller
class Konten extends CI_Controller
{
    // Konstruktor untuk menginisialisasi controller
    public function __construct()
    {
        // Memanggil konstruktor parent
        parent::__construct();
        // Memeriksa apakah level pengguna di session tidak ada; jika tidak, arahkan ke halaman auth
        if ($this->session->userdata('level') == NULL) {
            redirect('auth');
        }
    }

    // Metode default untuk menampilkan daftar konten
    public function index()
    {
        // Kuery untuk mengambil kategori dari tabel 'kategori'
        $this->db->from('kategori');
        $this->db->order_by('nama_kategori', 'ASC'); // Mengurutkan hasil berdasarkan nama kategori
        $kategori = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Kuery untuk mengambil konten dari tabel 'konten' dengan join
        $this->db->from('konten a');
        $this->db->join('kategori b', 'a.id_kategori=b.id_kategori', 'left'); // Join dengan kategori
        $this->db->join('user c', 'a.username=c.username', 'left'); // Join dengan user
        $this->db->order_by('tanggal', 'ASC'); // Mengurutkan hasil berdasarkan tanggal
        $konten = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Menyiapkan data untuk diteruskan ke view
        $data = array(
            'judul_halaman' => 'Halaman Konten', // Judul halaman
            'kategori'      => $kategori, // Data kategori
            'konten'        => $konten // Data konten
        );

        // Memuat template admin dan view 'konten_index' dengan data yang telah disiapkan
        $this->template->load('template_admin', 'admin/konten_index', $data);
    }

    // Metode untuk menyimpan data konten baru
    public function simpan()
    {
        // Menghasilkan nama file foto berdasarkan tanggal dan waktu
        $namafoto = date('YmdHis') . '.jpg';
        // Konfigurasi untuk upload file
        $config['upload_path']      = 'assets/upload/konten'; // Lokasi upload
        $config['max_size']         = 500 * 1024; // 500Kb
        $config['file_name']        = $namafoto; // Nama file yang akan disimpan
        $config['allowed_types']     = '*'; // Tipe file yang diizinkan
        $this->load->library('upload', $config); // Memuat library upload

        // Memeriksa ukuran file yang diupload
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            // Menyiapkan pesan alert jika ukuran foto terlalu besar
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 Kb. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Mengarahkan kembali ke halaman konten
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            // Jika upload gagal, ambil error
            $error = array('error' => $this->upload->display_errors());
        } else {
            // Jika upload berhasil, ambil data upload
            $data = array('upload_data' => $this->upload->data());
        }

        // Kuery untuk memeriksa apakah judul konten sudah ada
        $this->db->from('konten');
        $this->db->where('judul', $this->input->post('judul')); // Memfilter berdasarkan judul
        $cek = $this->db->get()->result_array(); // Mengambil semua hasil sebagai array

        // Memeriksa jika judul konten sudah ada
        if ($cek <> NULL) {
            // Menyiapkan pesan alert jika judul sudah ada
            $this->session->set_flashdata('alert', '
            <div class="alert alert-dark alert-dismissible mb-0" role="alert">
                Judul konten sudah ada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ');
            // Mengarahkan kembali ke halaman konten
            redirect('admin/konten');
        }

        // Menyiapkan data konten untuk disimpan
        $data = array(
            'judul'     => $this->input->post('judul'), // Judul konten
            'id_kategori' => $this->input->post('id_kategori'), // ID kategori
            'keterangan' => $this->input->post('keterangan'), // Keterangan konten
            'tanggal'    => date('Y-m-d'), // Tanggal konten dibuat
            'foto'       => $namafoto, // Nama foto
            'username'   => $this->session->userdata('username'), // Username pengunggah
            'slug'       => str_replace(' ', '-', $this->input->post('judul')), // Membuat slug dari judul
        );

        // Menyimpan data konten ke tabel 'konten'
        $this->db->insert('konten', $data);

        // Menyiapkan pesan alert jika berhasil menambahkan konten
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil menambahkan konten.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        // Mengarahkan kembali ke halaman konten
        redirect('admin/konten');
    }

    // Metode untuk memperbarui data konten
    public function update()
    {
        // Mengambil nama foto yang sudah ada
        $namafoto = $this->input->post('nama_foto');
        // Konfigurasi untuk upload file
        $config['upload_path']      = 'assets/upload/konten'; // Lokasi upload
        $config['max_size']         = 500 * 1024; // 500Kb
        $config['file_name']        = $namafoto; // Nama file yang akan disimpan
        $config['overwrite']        = true; // Mengizinkan overwrite file yang ada
        $config['allowed_types']    = '*'; // Tipe file yang diizinkan
        $this->load->library('upload', $config); // Memuat library upload

        // Memeriksa ukuran file yang diupload
        if ($_FILES['foto']['size'] >= 500 * 1024) {
            // Menyiapkan pesan alert jika ukuran foto terlalu besar
            $this->session->set_flashdata('alert', '
            <div class="alert alert-danger alert-dismissible" role="alert">
                Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 500 Kb. 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            // Mengarahkan kembali ke halaman konten
            redirect('admin/konten');
        } elseif (!$this->upload->do_upload('foto')) {
            // Jika upload gagal, ambil error
            $error = array('error' => $this->upload->display_errors());
        } else {
            // Jika upload berhasil, ambil data upload
            $data = array('upload_data' => $this->upload->data());
        }

        // Menyiapkan data konten untuk diperbarui
        $data = array(
            'judul'     => $this->input->post('judul'), // Judul konten
            'id_kategori' => $this->input->post('id_kategori'), // ID kategori
            'keterangan' => $this->input->post('keterangan'), // Keterangan konten
            'slug'     => str_replace(' ', '-', $this->input->post('judul')), // Membuat slug dari judul
        );

        // Menyiapkan kondisi untuk pembaruan
        $where = array(
            'foto' => $this->input->post('nama_foto') // Nama foto yang akan diperbarui
        );

        // Memperbarui data konten di tabel 'konten'
        $this->db->update('konten', $data, $where);

        // Menyiapkan pesan alert jika berhasil memperbarui konten
        $this->session->set_flashdata('alert', '
        <div class="alert alert-dark alert-dismissible mb-0" role="alert">
            Berhasil memperbarui konten.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ');
        // Mengarahkan kembali ke halaman konten
        redirect('admin/konten');
    }
    
    public function delete_data($id) {
            $filename=FCPATH.'/assets/upload/konten/'.$id;
                if (file_exists($filename)){
                    unlink("./assets/upload/konten/".$id);
                }
            $where = array(
                'foto'	=> $id
            );
            $this->db->delete('konten', $where);
            $this->session->set_flashdata('alert', '
            <div class="alert alert-info alert-dismissible mb-4" role="alert">
            Berhasil menghapus konten
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>'
            );
            redirect('admin/konten');
        }
}