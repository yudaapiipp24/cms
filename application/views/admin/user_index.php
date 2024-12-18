<div id="ngilang"> <!-- Kontainer untuk pesan alert -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan alert dari session -->
</div>
<div class="col-lg-12 col-md-12"> <!-- Kolom responsif untuk layout -->
    <div class="mt-1 mb-3"> <!-- Margin atas dan bawah -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter"> <!-- Tombol untuk memicu modal -->
            Tambah User <!-- Teks tombol -->
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true"> <!-- Modal untuk menambahkan user -->
            <div class="modal-dialog modal-md" role="document"> <!-- Dialog modal sedang -->
                <form action="<?= base_url('admin/user/simpan') ?>" method="post"> <!-- Form untuk mengirim data user -->
                    <div class="modal-content"> <!-- Pembungkus konten modal -->
                        <div class="modal-header"> <!-- Header dari modal -->
                            <h5 class="modal-title" id="modalCenterTitle">Tambah User</h5> <!-- Judul modal -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                        </div>
                        <div class="modal-body"> <!-- Bagian tubuh dari modal -->
                            <div class="row"> <!-- Baris untuk layout form -->
                                <div class="col mb-3"> <!-- Kolom untuk input -->
                                    <label class="form-label">Nama</label> <!-- Label untuk input nama -->
                                    <input type="text" class="form-control" placeholder="Nama" name="nama" required /> <!-- Input untuk nama -->
                                </div>
                            </div>
                            <div class="row"> <!-- Baris untuk layout form -->
                                <div class="col mb-3"> <!-- Kolom untuk input -->
                                    <label class="form-label">Username</label> <!-- Label untuk input username -->
                                    <input type="text" class="form-control" placeholder="Username" name="username" required /> <!-- Input untuk username -->
                                </div>
                            </div>
                            <div class="row"> <!-- Baris untuk layout form -->
                                <div class="col mb-3"> <!-- Kolom untuk input -->
                                    <label class="form-label">Password</label> <!-- Label untuk input password -->
                                    <input type="password" class="form-control" placeholder="Password" name="password" required /> <!-- Input untuk password -->
                                </div>
                            </div>
                            <div class="row"> <!-- Baris untuk layout form -->
                                <div class="col mb-3"> <!-- Kolom untuk input -->
                                    <label class="form-label">Level</label> <!-- Label untuk input level -->
                                    <select name="level" class="form-control"> <!-- Dropdown untuk memilih level -->
                                        <option value="Admin">Admin</option> <!-- Opsi Admin -->
                                        <option value="kontributor">User</option> <!-- Opsi Kontributor -->
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer"> <!-- Bagian footer dari modal -->
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                            <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan -->
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="card"> <!-- Kartu untuk menampilkan data pengguna -->
    <h5 class="card-header">Data Pengguna</h5> <!-- Header kartu -->
    <div class="table-responsive text-nowrap"> <!-- Pembungkus tabel responsif -->
        <table class="table"> <!-- Tabel untuk data pengguna -->
            <thead>
                <tr>
                    <th>Username</th> <!-- Header tabel untuk username -->
                    <th>Nama</th> <!-- Header tabel untuk nama -->
                    <th>Level</th> <!-- Header tabel untuk level -->
                    <th>Aksi</th> <!-- Header tabel untuk aksi -->
                </tr>
            </thead>
            <tbody class="table-border-bottom-0"> <!-- Badan tabel -->
                <?php foreach ($user as $aa) { ?> <!-- Loop melalui pengguna -->
                    <tr>
                        <td><?= $aa['username'] ?></td> <!-- Menampilkan username -->
                        <td><?= $aa['nama'] ?></td> <!-- Menampilkan nama -->
                        <td><?= $aa['level'] == 'kontributor'? 'User': $aa['level']  ?></td> <!-- Menampilkan level -->
                        <td>
                            <a href="<?php echo site_url('admin/user/delete_data/' . $aa['id_user']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol hapus dengan konfirmasi -->
                                <span class="tf-icons bx bx-trash-alt"></span> <!-- Ikon hapus -->
                            </a>
                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#edit<?= $aa['id_user'] ?>"> <!-- Tombol edit yang memicu modal edit -->
                                <span class="tf-icons bx bx-edit"></span> <!-- Ikon edit -->
                            </button>
                            <div class="modal fade" id="edit<?= $aa['id_user'] ?>" tabindex="-1" aria-hidden="true"> <!-- Modal untuk mengedit user -->
                                <div class="modal-dialog modal-md" role="document"> <!-- Dialog modal sedang -->
                                    <form action="<?= base_url('admin/user/update') ?>" method="post"> <!-- Form untuk memperbarui user -->
                                        <input type="hidden" name="id_user" value="<?= $aa['id_user'] ?>"> <!-- Input tersembunyi untuk ID user -->
                                        <div class="modal-content"> <!-- Pembungkus konten modal -->
                                            <div class="modal-header"> <!-- Header dari modal -->
                                                <h5 class="modal-title" id="modalCenterTitle">Perbarui Nama User</h5> <!-- Judul modal -->
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> <!-- Tombol tutup -->
                                            </div>
                                            <div class="modal-body"> <!-- Bagian tubuh dari modal -->
                                                <div class="row"> <!-- Baris untuk layout form -->
                                                    <div class="col mb-3"> <!-- Kolom untuk input -->
                                                        <label class="form-label">Nama</label> <!-- Label untuk input nama -->
                                                        <input type="text" class="form-control" value="<?= $aa['nama'] ?>" name="nama" /> <!-- Input untuk nama dengan nilai yang ada -->
                                                    </div>
                                                </div>
                                                <div class="row"> <!-- Baris untuk layout form -->
                                                    <div class="col mb-3"> <!-- Kolom untuk input -->
                                                        <label class="form-label">Username</label> <!-- Label untuk input username -->
                                                        <input type="text" class="form-control" value="<?= $aa['username'] ?>" name="username" readonly /> <!-- Input untuk username yang hanya baca -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer"> <!-- Bagian footer dari modal -->
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button> <!-- Tombol tutup -->
                                                <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan -->
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php } ?> <!-- Akhir loop pengguna -->
            </tbody>
        </table>
    </div>
</div>