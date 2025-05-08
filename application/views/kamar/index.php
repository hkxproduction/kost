<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 40px;"></h2>
<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 20px;">Daftar Kamar</h2>

<a href="<?= site_url('kamar/tambah') ?>" style="display: inline-block; padding: 10px 16px; background-color: #4F46E5; color: white; border-radius: 6px; text-decoration: none; font-weight: bold; margin-bottom: 20px;">+ Tambah Kamar</a>

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; margin-top: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
  <thead style="background-color: #F9FAFB;">
    <tr>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">No</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Nomor</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Tipe</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Harga</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Fasilitas</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Gambar</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Status</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kamar as $i => $k): ?>
    <tr class="row-kamar"
        data-nomor="<?= $k->nomor_kamar ?>"
        data-tipe="<?= $k->tipe ?>"
        data-harga="Rp<?= number_format($k->harga, 0, ',', '.') ?>"
        data-fasilitas="<?= htmlspecialchars($k->fasilitas ?? '') ?>"
        data-gambar="<?= !empty($k->gambar) ? base_url('uploads/kamar/' . $k->gambar) : 'https://placehold.co/600x400' ?>"
        data-status="<?= $k->status ?>"
        style="cursor: pointer; border-bottom: 1px solid #E5E7EB; background-color: <?= $i % 2 == 0 ? '#FFFFFF' : '#F3F4F6' ?>;">
      <td style="padding: 12px;"><?= $i + 1 ?></td>
      <td style="padding: 12px;"><?= $k->nomor_kamar ?></td>
      <td style="padding: 12px;"><?= $k->tipe ?></td>
      <td style="padding: 12px;">Rp<?= number_format($k->harga, 0, ',', '.') ?></td>
      <td style="padding: 12px;"><?= !empty($k->fasilitas) ? nl2br(htmlspecialchars($k->fasilitas ?? '')) : '-' ?></td>
      <td style="padding: 12px;">
        <?php 
          $gambarList = json_decode($k->gambar, true);
          $gambarPertama = !empty($gambarList[0]) ? base_url('uploads/kamar/' . $gambarList[0]) : 'https://placehold.co/600x400';
        ?>
        <img src="<?= $gambarPertama ?>" 
            alt="Gambar Kamar" 
            style="width: 120px; height: 80px; object-fit: cover; border-radius: 6px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);" 
            onclick='tampilkanModalGambar(<?= $k->gambar; ?>)' />
      </td>
      <td style="padding: 12px;">
        <span style="padding: 6px 12px; background-color: <?= $k->status == 'kosong' ? '#D1FAE5' : '#FECACA' ?>; color: <?= $k->status == 'kosong' ? '#065F46' : '#991B1B' ?>; border-radius: 4px; font-size: 14px;"><?= $k->status ?></span>
      </td>
      <td style="padding: 12px;">
        <a href="<?= site_url('kamar/edit/'.$k->id) ?>" style="color: #2563EB; text-decoration: none; margin-right: 8px;">Edit</a>
        <a href="<?= site_url('kamar/hapus/'.$k->id) ?>" onclick="return confirm('Hapus kamar ini?')" style="color: #DC2626; text-decoration: none;">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?> 
  </tbody>
</table>

<!-- Modal Detail -->
<div id="modalGambarKamar" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
  background-color: rgba(0,0,0,0.6); justify-content: center; align-items: center; z-index: 10000;">
  <div style="background: white; padding: 20px; border-radius: 8px; width: 90%; max-width: 800px; max-height: 90vh; overflow-y: auto; position: relative;">
    <button onclick="document.getElementById('modalGambarKamar').style.display='none'" 
            style="position: absolute; top: 10px; right: 10px; font-weight: bold; background: none; border: none; font-size: 24px; color: #333;">&times;</button>
    <h3 style="margin-bottom: 16px; font-size: 20px;">Semua Gambar Kamar</h3>
    <div id="gambarGrid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px;"></div>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Nomor:</strong> <span id="modalNomor"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Tipe:</strong> <span id="modalTipe"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Harga:</strong> <span id="modalHarga"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Status:</strong> <span id="modalStatus"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Fasilitas:</strong><br><span id="modalFasilitas"></span></p>
  </div>
</div>

<script>
document.querySelectorAll('.row-kamar').forEach(row => {
  row.addEventListener('click', function() {
    document.getElementById('modalNomor').innerText = this.dataset.nomor;
    document.getElementById('modalTipe').innerText = this.dataset.tipe;
    document.getElementById('modalHarga').innerText = this.dataset.harga;
    document.getElementById('modalStatus').innerText = this.dataset.status;
    document.getElementById('modalFasilitas').innerHTML = this.dataset.fasilitas.replace(/\n/g, '<br>');
    document.getElementById('modalDetail').style.display = 'flex';
  });
});
function tampilkanModalGambar(gambarArray) {
  const container = document.getElementById('gambarGrid');
  container.innerHTML = ''; // Kosongkan isi sebelumnya

  gambarArray.forEach(filename => {
    const img = document.createElement('img');
    img.src = '<?= base_url('uploads/kamar/') ?>' + filename;
    img.style.width = '100%';
    img.style.borderRadius = '6px';
    img.style.objectFit = 'cover';
    img.style.height = '150px';
    container.appendChild(img);
  });

  document.getElementById('modalGambarKamar').style.display = 'flex';
}
</script>