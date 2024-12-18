<div id="ngilang"> <!-- Kontainer untuk pesan alert -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan alert dari session -->
</div>

<div class="col-lg-12 col-md-12"> <!-- Kolom responsif untuk layout -->
    <div class="mt-1 mb-3"> <!-- Margin atas dan bawah -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> <!-- Tombol untuk memicu modal -->
            Tambah Kategori <!-- Teks tombol -->
        </button>

        <!-- Modal Tambah Kategori -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"> <!-- Modal untuk menambahkan kategori -->
            <div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal besar -->
                <form action="<?= base_url('admin/kategori/simpan') ?>" method="post"> <!-- Form untuk mengirim data kategori -->
                    <div class="modal-content"> <!-- Pembungkus konten modal -->
                        <div class="modal-header"> <!-- Header dari modal -->
                            <h5 class="modal-title" id="modalCenterTitle">Tambah Kategori</h5> <!-- Judul modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                        </div>
                        <div class="modal-body"> <!-- Bagian tubuh dari modal -->
                            <div class="row"> <!-- Baris untuk layout form -->
                                <div class="col mb-3"> <!-- Kolom untuk input -->
                                    <label class="form-label">Nama Kategori</label> <!-- Label untuk input -->
                                    <input type="text" class="form-control" placeholder="Nama kategori" name="nama_kategori" required /> <!-- Input untuk nama kategori -->
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"> <!-- Bagian footer dari modal -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                            <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk mengirim -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Kategori Konten -->
<div class="card"> <!-- Kartu untuk tabel kategori -->
    <h5 class="card-header">Kategori Konten</h5> <!-- Header kartu -->
    <div class="table-responsive text-nowrap"> <!-- Pembungkus tabel responsif -->
        <table class="table"> <!-- Tabel untuk kategori -->
            <thead>
                <tr>
                    <th>No</th> <!-- Header tabel untuk nomor -->
                    <th>Nama Kategori Konten</th> <!-- Header tabel untuk nama kategori -->
                    <th>Aksi</th> <!-- Header tabel untuk aksi -->
                </tr>
            </thead>
            <tbody class="table-border-bottom-0"> <!-- Badan tabel -->
                <?php $no = 1; // Inisialisasi penghitung untuk nomor baris 
                ?>
                <?php foreach ($kategori as $aa) { ?> <!-- Loop melalui kategori -->
                    <tr>
                        <td><?= $no ?></td> <!-- Menampilkan nomor baris -->
                        <td><?= $aa['nama_kategori'] ?></td> <!-- Menampilkan nama kategori -->
                        <td>
                            <!-- Tombol Hapus -->
                            <a href="<?php echo site_url('admin/kategori/delete_data/' . $aa['id_kategori']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol hapus dengan konfirmasi -->
                                <span class="tf-icons bx bx-trash-alt"></span> <!-- Ikon hapus -->
                            </a>

                            <!-- Tombol Edit -->
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $aa['id_kategori'] ?>"> <!-- Tombol edit yang memicu modal edit -->
                                <span class="tf-icons bx bx-edit"></span> <!-- Ikon edit -->
                            </button>

                            <!-- Modal Edit Kategori -->
                            <div class="modal fade" id="edit<?= $aa['id_kategori'] ?>" tabindex="-1" aria-hidden="true"> <!-- Modal untuk mengedit kategori -->
                                <div class="modal-dialog modal-md" role="document"> <!-- Dialog modal sedang -->
                                    <form action="<?= base_url('admin/kategori/update') ?>" method="post"> <!-- Form untuk memperbarui kategori -->
                                        <input type="hidden" name="id_kategori" value="<?= $aa['id_kategori'] ?>"> <!-- Input tersembunyi untuk ID kategori -->
                                        <div class="modal-content"> <!-- Pembungkus konten modal -->
                                            <div class="modal-header"> <!-- Header dari modal -->
                                                <h5 class="modal-title" id="modalCenterTitle">Perbarui Kategori</h5> <!-- Judul modal -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                                            </div>
                                            <div class="modal-body"> <!-- Bagian tubuh dari modal -->
                                                <div class="row"> <!-- Baris untuk layout form -->
                                                    <div class="col mb-3"> <!-- Kolom untuk input -->
                                                        <label class="form-label">Nama Kategori Konten</label> <!-- Label untuk input -->
                                                        <input type="text" class="form-control" value="<?= $aa['nama_kategori'] ?>" name="nama_kategori" /> <!-- Input untuk nama kategori dengan nilai yang ada -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"> <!-- Bagian footer dari modal -->
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                                                <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan -->
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- Akhir modal edit -->
                        </td>
                    </tr>
                <?php $no++;
                } // Menambah nomor baris 
                ?>
            </tbody>
        </table>
    </div>
</div>