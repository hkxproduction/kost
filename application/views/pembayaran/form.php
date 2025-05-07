<h2><?= isset($pembayaran) ? 'Edit' : 'Tambah' ?> Pembayaran</h2>
<form method="post">
  Penghuni: <select name="penghuni_id">
    <?php foreach ($penghuni as $p): ?>
    <option value="<?= $p->id ?>"><?= $p->nama ?></option>
    <?php endforeach ?>
  </select><br>
  Bulan: <input type="text" name="bulan" value="<?= $pembayaran->bulan ?? '' ?>"><br>
  Jumlah: <input type="number" name="jumlah" value="<?= $pembayaran->jumlah ?? '' ?>"><br>
  Tanggal Bayar: <input type="date" name="tanggal_bayar" value="<?= $pembayaran->tanggal_bayar ?? '' ?>"><br>
  Status: <select name="status">
    <option value="lunas">Lunas</option>
    <option value="belum">Belum</option>
  </select><br>
  <button type="submit">Simpan</button>
</form>
