<div id="ngilang"> <!-- Kontainer untuk notifikasi yang akan muncul dan menghilang -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session, seperti notifikasi -->
</div>
<div class="col-xl-12"> <!-- Kontainer kolom untuk layout -->
    <div class="card"> <!-- Awal dari kartu untuk form -->
        <form action="<?= base_url('admin/caraousel/simpan') ?>" method="post" enctype='multipart/form-data'> <!-- Form untuk meng-upload data -->
            <h5 class="card-header">File input</h5> <!-- Judul kartu -->
            <div class="card-body"> <!-- Konten utama dari kartu -->
                <div class="col mb-3"> <!-- Kontainer untuk input judul -->
                    <label class="form-label">Judul</label> <!-- Label untuk input judul -->
                    <input type="text" class="form-control" placeholder="Judul Foto" name="judul" required /> <!-- Input untuk judul foto -->
                </div>
                <div class="mb-3"> <!-- Kontainer untuk input foto -->
                    <label for="formFile" class="form-label">Pilih Foto dengan ukuran (1:3)</label> <!-- Label untuk input foto -->
                    <input class="form-control" type="file" name="foto"> <!-- Input untuk memilih file foto -->
                </div>
            </div>
            <div class="modal-footer"> <!-- Bagian footer dari modal -->
                <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan data -->
            </div>
        </form>
    </div>
</div>
<?php foreach ($caraousel as $aa) { ?> <!-- Looping untuk menampilkan setiap item dalam array caraousel -->
    <div class="col-md-12 mb-3 mt-3"> <!-- Kontainer kolom untuk setiap item -->
        <div class="card h-100"> <!-- Awal kartu untuk item -->
            <img class="card-img-top" src="<?= base_url('assets/upload/caraousel/' . $aa['foto']) ?>"> <!-- Gambar dari item -->
            <div class="card-body"> <!-- Konten utama dari kartu item -->
                <h5 class="card-title"><?= $aa['judul'] ?></h5> <!-- Judul dari item -->
                <a href="<?php echo site_url('admin/caraousel/delete_data/' . $aa['foto']); ?>" class="btn btn-sm btn-danger" onClick="return confirm('Apakah anda yakin menghapus data ini?')"> <!-- Tombol untuk menghapus item -->
                    <span class="tf-icons bx bx-trash-alt"></span> <!-- Ikon untuk tombol hapus -->
                </a>
            </div>
        </div>
    </div>
<?php } ?> <!-- Penutupan loop -->