<h2><?= isset($penghuni) ? 'Edit' : 'Tambah' ?> Penghuni</h2>
<form method="post">
  Nama: <input type="text" name="nama" value="<?= $penghuni->nama ?? '' ?>"><br>
  NIK: <input type="text" name="nik" value="<?= $penghuni->nik ?? '' ?>"><br>
  Nomor HP: <input type="text" name="no_hp" value="<?= $penghuni->no_hp ?? '' ?>"><br>
  Kamar: <select name="kamar_id">
    <?php foreach ($kamar as $k): ?>
    <option value="<?= $k->id ?>"><?= $k->nomor_kamar ?></option>
    <?php endforeach ?>
  </select><br>
  Tanggal Masuk: <input type="date" name="tanggal_masuk" value="<?= $penghuni->tanggal_masuk ?? '' ?>"><br>
  Status: <select name="status">
    <option value="aktif">Aktif</option>
    <option value="keluar">Keluar</option>
  </select><br>
  <button type="submit">Simpan</button>
</form>
