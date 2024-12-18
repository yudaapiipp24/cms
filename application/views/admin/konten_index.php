<div id="ngilang"> <!-- Kontainer untuk pesan alert -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session -->
</div>

<div class="col-lg-12 col-md-12"> <!-- Kontainer kolom untuk tombol "Tambah Konten" -->
    <div class="mt-1 mb-3"> <!-- Pengaturan margin -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> <!-- Tombol untuk membuka modal tambah konten -->
            Tambah Konten
        </button>

        <!-- Modal untuk Menambah Konten -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"> <!-- Struktur modal -->
            <div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal besar -->
                <form action="<?= base_url('admin/konten/simpan') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk pengiriman konten -->
                    <div class="modal-content"> <!-- Kontainer untuk konten modal -->
                        <div class="modal-header"> <!-- Bagian header modal -->
                            <h5 class="modal-title" id="modalCenterTitle">Tambah Konten</h5> <!-- Judul modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                        </div>
                        <div class="modal-body"> <!-- Bagian tubuh modal -->
                            <div class="row"> <!-- Baris pertama untuk input judul -->
                                <div class="col mb-3"> <!-- Kolom untuk input judul -->
                                    <label class="form-label">Judul</label> <!-- Label untuk judul -->
                                    <input type="text" class="form-control" placeholder="Judul" name="judul" required /> <!-- Input untuk judul -->
                                </div>
                            </div>
                            <div class="row"> <!-- Baris kedua untuk pemilihan kategori -->
                                <div class="col mb-3"> <!-- Kolom untuk pemilihan kategori -->
                                    <label class="form-label">Kategori</label> <!-- Label untuk kategori -->
                                    <select name="id_kategori" class="form-control"> <!-- Dropdown untuk memilih kategori -->
                                        <?php foreach ($kategori as $aa) { ?> <!-- Loop melalui kategori -->
                                            <option value="<?= $aa['id_kategori'] ?>"><?= $aa['nama_kategori'] ?></option> <!-- Opsi untuk setiap kategori -->
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row"> <!-- Baris ketiga untuk input keterangan -->
                                <div class="col mb-3"> <!-- Kolom untuk textarea keterangan -->
                                    <label class="form-label">Keterangan</label> <!-- Label untuk keterangan -->
                                    <textarea name="keterangan" class="form-control"></textarea> <!-- Textarea untuk keterangan -->
                                </div>
                            </div>
                            <div class="row"> <!-- Baris keempat untuk input foto -->
                                <div class="col mb-3"> <!-- Kolom untuk upload file -->
                                    <label class="form-label">foto</label> <!-- Label untuk upload foto -->
                                    <input type="file" name="foto" class="form-control" accept="image/png, image/jpeg"> <!-- Input file untuk gambar -->
                                </div>
                            </div>
                            <div class="modal-footer"> <!-- Bagian footer modal -->
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                                <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan konten -->
                            </div>
                        </div> <!-- Akhir dari tubuh modal -->
                    </div> <!-- Akhir dari konten modal -->
                </form>
            </div>
        </div> <!-- Akhir dari modal -->
    </div>
</div>

<div class="card"> <!-- Kontainer kartu untuk tabel konten -->
    <h5 class="card-header">Kategori Konten</h5> <!-- Judul kartu -->
    <div class="table-responsive text-nowrap"> <!-- Kontainer tabel responsif -->
        <table class="table"> <!-- Mulai tabel -->
            <thead> <!-- Header tabel -->
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori Konten</th>
                    <th>Tanggal</th>
                    <th>Kreator</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0"> <!-- Badan tabel -->
                <?php $no = 1; // Inisialisasi nomor baris
                foreach ($konten as $aa) { ?> <!-- Loop melalui array konten -->
                    <tr> <!-- Mulai baris tabel -->
                        <td><?= $no ?></td> <!-- Nomor baris -->
                        <td><?= $aa['judul'] ?></td> <!-- Judul konten -->
                        <td><?= $aa['nama_kategori'] ?></td> <!-- Kategori konten -->
                        <td><?= $aa['tanggal'] ?></td> <!-- Tanggal konten -->
                        <td><?= $aa['nama'] ?></td> <!-- Kreator konten -->
                        <td> <!-- Kolom untuk melihat gambar -->
                            <div class="mt-2 mb-2"> <!-- Penyesuaian margin -->
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#imageModal<?= $no; ?>">Lihat Foto</button> <!-- Tombol untuk melihat gambar -->
                                <div class="modal fade" id="imageModal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true"> <!-- Modal untuk melihat gambar -->
                                    <div class="modal-dialog" role="document"> <!-- Dialog modal -->
                                        <div class="modal-content"> <!-- Konten modal -->
                                            <div class="modal-header"> <!-- Header modal -->
                                                <h5 class="modal-title" id="imageModalLabel">Tampilan Gambar</h5> <!-- Judul untuk modal gambar -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                                            </div>
                                            <div class="modal-body" style="display: flex; justify-content: center; align-items: center;"> <!-- Tubuh modal untuk gambar -->
                                                <img src="<?= base_url('assets/upload/konten/' . $aa['foto']); ?>" alt="Gambar" class="img-fluid" id="modalImage" style="width: 400px; border-radius: 10px; box-shadow: 2px 2px 10px black; max-width: 400px;"> <!-- Menampilkan gambar -->
                                            </div>
                                            <div class="modal-footer"> <!-- Footer modal gambar -->
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td> <!-- Kolom untuk aksi -->
                            <a href="<?php echo site_url('admin/konten/delete_data/' . $aa['foto']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol untuk menghapus konten -->
                                <span class="tf-icons bx bx-trash-alt"></span>
                            </a>
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#konten<?= $no ?>"> <!-- Tombol untuk mengedit konten -->
                                <span class="tf-icons bx bx-edit"></span>
                            </button>

                            <!-- Modal untuk Mengedit Konten -->
                            <div class="modal fade" id="konten<?= $no ?>" tabindex="-1" aria-hidden="true"> <!-- Modal untuk pengeditan -->
                                <div class="modal-dialog modal-lg" role="document"> <!-- Dialog modal besar -->
                                    <form action="<?= base_url('admin/konten/update') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk pembaruan konten -->
                                        <input type="hidden" name="nama_foto" value="<?= $aa['foto'] ?>"> <!-- Field tersembunyi untuk foto saat ini -->
                                        <div class="modal-content"> <!-- Konten modal -->
                                            <div class="modal-header"> <!-- Header modal -->
                                                <h5 class="modal-title" id="modalCenterTitle"><?= $aa['judul'] ?></h5> <!-- Judul modal untuk pengeditan -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                                            </div>
                                            <div class="modal-body"> <!-- Bagian tubuh modal -->
                                                <div class="row"> <!-- Baris pertama untuk input judul -->
                                                    <div class="col mb-3"> <!-- Kolom untuk input judul -->
                                                        <label class="form-label">Judul</label> <!-- Label untuk judul -->
                                                        <input type="text" class="form-control" value="<?= $aa['judul'] ?>" name="judul" /> <!-- Input untuk judul, terisi sebelumnya -->
                                                    </div>
                                                </div>
                                                <div class="row"> <!-- Baris kedua untuk pemilihan kategori -->
                                                    <div class="col mb-3"> <!-- Kolom untuk pemilihan kategori -->
                                                        <label class="form-label">Kategori</label> <!-- Label untuk kategori -->
                                                        <select name="id_kategori" class="form-control"> <!-- Dropdown untuk memilih kategori -->
                                                            <?php foreach ($kategori as $uu) { ?> <!-- Loop melalui kategori -->
                                                                <option <?php if ($uu['id_kategori'] == $aa['id_kategori']) {
                                                                            echo "selected"; // Menandai kategori yang dipilih
                                                                        } ?> value="<?= $uu['id_kategori'] ?>"><?= $uu['nama_kategori'] ?></option> <!-- Opsi untuk kategori -->
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row"> <!-- Baris ketiga untuk input keterangan -->
                                                    <div class="col mb-3"> <!-- Kolom untuk textarea keterangan -->
                                                        <label class="form-label">Keterangan</label> <!-- Label untuk keterangan -->
                                                        <textarea name="keterangan" class="form-control"><?= $aa['keterangan'] ?> </textarea> <!-- Textarea untuk keterangan -->
                                                    </div>
                                                </div>
                                                <div class="row"> <!-- Baris keempat untuk input foto -->
                                                    <div class="col mb-3"> <!-- Kolom untuk upload file -->
                                                        <label class="form-label">foto</label> <!-- Label untuk upload foto -->
                                                        <input type="file" name="foto" class="form-control" accept="image/png, image/jpeg"> <!-- Input file untuk gambar -->
                                                    </div>
                                                </div>
                                                <div class="modal-footer"> <!-- Bagian footer modal -->
                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                                                    <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan perubahan -->
                                                </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php $no++; // Increment nomor baris
                } ?>
            </tbody>
        </table>
    </div>
</div>