<h2>Daftar Penghuni</h2>
<a href="<?= site_url('penghuni/tambah') ?>">Tambah Penghuni</a>
<table border="1" cellpadding="5">
  <tr>
    <th>No</th><th>Nama</th><th>NIK</th><th>Nomor HP</th><th>Kamar</th><th>Status</th><th>Aksi</th>
  </tr>
  <?php foreach ($penghuni as $i => $p): ?>
  <tr>
    <td><?= $i + 1 ?></td>
    <td><?= $p->nama ?></td>
    <td><?= $p->nik ?></td>
    <td><?= $p->no_hp ?></td>
    <td><?= $p->nomor_kamar ?></td>
    <td><?= $p->status ?></td>
    <td>
      <a href="<?= site_url('penghuni/edit/'.$p->id) ?>">Edit</a> |
      <a href="<?= site_url('penghuni/hapus/'.$p->id) ?>" onclick="return confirm('Hapus data?')">Hapus</a>
    </td>
  </tr>
  <?php endforeach ?>
</table>
