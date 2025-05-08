<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 20px;">Daftar Kamar</h2>

<a href="<?= site_url('kamar/tambah') ?>" style="display: inline-block; padding: 10px 16px; background-color: #4F46E5; color: white; border-radius: 6px; text-decoration: none; font-weight: bold; margin-bottom: 20px;">+ Tambah Kamar</a>

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; margin-top: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
  <thead style="background-color: #F9FAFB;">
    <tr>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">No</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Nomor</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Tipe</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Harga</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Status</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kamar as $i => $k): ?>
    <tr style="border-bottom: 1px solid #E5E7EB; background-color: <?= $i % 2 == 0 ? '#FFFFFF' : '#F3F4F6' ?>;">
      <td style="padding: 12px;"><?= $i + 1 ?></td>
      <td style="padding: 12px;"><?= $k->nomor_kamar ?></td>
      <td style="padding: 12px;"><?= $k->tipe ?></td>
      <td style="padding: 12px;">Rp<?= number_format($k->harga, 0, ',', '.') ?></td>
      <td style="padding: 12px;">
        <span style="padding: 6px 12px; background-color: <?= $k->status == 'Tersedia' ? '#D1FAE5' : '#FECACA' ?>; color: <?= $k->status == 'Tersedia' ? '#065F46' : '#991B1B' ?>; border-radius: 4px; font-size: 14px;"><?= $k->status ?></span>
      </td>
      <td style="padding: 12px;">
        <a href="<?= site_url('kamar/edit/'.$k->id) ?>" style="color: #2563EB; text-decoration: none; margin-right: 8px;">Edit</a>
        <a href="<?= site_url('kamar/hapus/'.$k->id) ?>" onclick="return confirm('Hapus kamar ini?')" style="color: #DC2626; text-decoration: none;">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?> 
  </tbody>
</table>
