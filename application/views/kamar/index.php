<h2>Daftar Kamar</h2>
<a href="<?= site_url('kamar/tambah') ?>">Tambah Kamar</a>
<table border="1" cellpadding="5">
  <tr>
    <th>No</th><th>Nomor</th><th>Tipe</th><th>Harga</th><th>Status</th><th>Aksi</th>
  </tr>
  <?php foreach ($kamar as $i => $k): ?>
  <tr>
    <td><?= $i + 1 ?></td>
    <td><?= $k->nomor_kamar ?></td>
    <td><?= $k->tipe ?></td>
    <td><?= $k->harga ?></td>
    <td><?= $k->status ?></td>
    <td>
      <a href="<?= site_url('kamar/edit/'.$k->id) ?>">Edit</a> |
      <a href="<?= site_url('kamar/hapus/'.$k->id) ?>" onclick="return confirm('Hapus kamar ini?')">Hapus</a>
    </td>
  </tr>
  <?php endforeach ?>
</table>
