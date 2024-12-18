<div id="ngilang"> <!-- Kontainer untuk pesan alert -->
    <?= $this->session->flashdata('alert') ?> <!-- Menampilkan pesan flash dari session -->
</div>

<form action="<?= base_url('admin/konfigurasi/update') ?>" method="post"> <!-- Form untuk mengirim pembaruan konfigurasi -->
    <div class="modal-content"> <!-- Pembungkus untuk konten modal -->
        <div class="modal-header"> <!-- Bagian header dari modal -->
            <h5 class="modal-title" id="modalCenterTitle">Konfigurasi</h5> <!-- Judul modal -->
        </div>
        <div class="modal-body"> <!-- Bagian tubuh dari modal -->
            <div class="row"> <!-- Awal baris pertama -->
                <div class="col mb-3"> <!-- Kolom untuk input pertama -->
                    <label class="form-label">Judul Website</label> <!-- Label untuk input -->
                    <input type="text" class="form-control" name="judul" value="<?= $konfig->judul_website; ?>" /> <!-- Input untuk judul website, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Awal baris kedua -->
                <div class="col mb-3"> <!-- Kolom untuk textarea profil -->
                    <label class="form-label">Profile</label> <!-- Label untuk input profil -->
                    <textarea name="profil_website" class="form-control"><?= $konfig->profil_website; ?></textarea> <!-- Textarea untuk profil website, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Awal baris ketiga -->
                <div class="col mb-3"> <!-- Kolom untuk input Facebook -->
                    <label class="form-label">Facebook</label> <!-- Label untuk input Facebook -->
                    <input type="text" class="form-control" name="facebook" value="<?= $konfig->facebook; ?>" /> <!-- Input untuk link Facebook, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Awal baris keempat -->
                <div class="col mb-3"> <!-- Kolom untuk input Instagram -->
                    <label class="form-label">Instagram</label> <!-- Label untuk input Instagram -->
                    <input type="text" class="form-control" name="instagram" value="<?= $konfig->instagram; ?>" /> <!-- Input untuk link Instagram, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Awal baris kelima -->
                <div class="col mb-3"> <!-- Kolom untuk input email -->
                    <label class="form-label">Email</label> <!-- Label untuk input email -->
                    <input type="email" class="form-control" name="email" value="<?= $konfig->email; ?>" /> <!-- Input untuk email, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Awal baris keenam -->
                <div class="col mb-3"> <!-- Kolom untuk input alamat -->
                    <label class="form-label">Alamat</label> <!-- Label untuk input alamat -->
                    <input type="text" class="form-control" name="alamat" value="<?= $konfig->alamat; ?>" /> <!-- Input untuk alamat, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="row"> <!-- Awal baris ketujuh -->
                <div class="col mb-3"> <!-- Kolom untuk input WhatsApp -->
                    <label class="form-label">Whatsapp</label> <!-- Label untuk input WhatsApp -->
                    <input type="text" class="form-control" name="no_wa" value="<?= $konfig->no_wa; ?>" /> <!-- Input untuk nomor WhatsApp, terisi dengan data yang ada -->
                </div>
            </div>
            <div class="modal-footer"> <!-- Bagian footer dari modal -->
                <button type="submit" class="btn btn-primary">Simpan</button> <!-- Tombol untuk menyimpan perubahan -->
            </div>
        </div> <!-- Akhir dari tubuh modal -->
    </div> <!-- Akhir dari konten modal -->
</form>