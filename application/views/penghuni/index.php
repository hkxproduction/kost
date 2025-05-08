<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 40px;"></h2>
<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 20px;">Daftar Penghuni</h2>

<a href="<?= site_url('penghuni/tambah') ?>" style="display: inline-block; padding: 10px 16px; background-color: #4F46E5; color: white; border-radius: 6px; text-decoration: none; font-weight: bold; margin-bottom: 20px;">+ Tambah Penghuni</a>

<table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif; margin-top: 20px; box-shadow: 0 4px 12px rgba(0,0,0,0.05);">
  <thead style="background-color: #F9FAFB;">
    <tr>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">No</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Nama</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">NIK</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Nomor HP</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Kamar</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Status</th>
      <th style="padding: 12px; text-align: left; border-bottom: 2px solid #E5E7EB;">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($penghuni as $i => $p): ?>
    <tr class="row-penghuni" 
        data-nama="<?= $p->nama ?>"
        data-nik="<?= $p->nik ?>"
        data-nohp="<?= $p->no_hp ?>"
        data-kamar="<?= $p->nomor_kamar ?>"
        data-status="<?= $p->status ?>"
        style="cursor: pointer; border-bottom: 1px solid #E5E7EB; background-color: <?= $i % 2 == 0 ? '#FFFFFF' : '#F3F4F6' ?>;">
      <td style="padding: 12px;"><?= $i + 1 ?></td>
      <td style="padding: 12px;"><?= $p->nama ?></td>
      <td style="padding: 12px;"><?= $p->nik ?></td>
      <td style="padding: 12px;"><?= $p->no_hp ?></td>
      <td style="padding: 12px;"><?= $p->nomor_kamar ?></td>
      <td style="padding: 12px;">
        <span style="padding: 6px 12px; background-color: <?= $p->status == 'Aktif' ? '#D1FAE5' : '#FECACA' ?>; color: <?= $p->status == 'Aktif' ? '#065F46' : '#991B1B' ?>; border-radius: 4px; font-size: 14px;"><?= $p->status ?></span>
      </td>
      <td style="padding: 12px;">
        <a href="<?= site_url('penghuni/edit/'.$p->id) ?>" style="color: #2563EB; text-decoration: none; margin-right: 8px;">Edit</a>
        <a href="<?= site_url('penghuni/hapus/'.$p->id) ?>" onclick="return confirm('Hapus data?')" style="color: #DC2626; text-decoration: none;">Hapus</a>
      </td>
    </tr>
    <?php endforeach ?> 
  </tbody>
</table>

<!-- Modal Detail Penghuni -->
<div id="modalDetailPenghuni" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
  background-color: rgba(0,0,0,0.5); justify-content: center; align-items: center; z-index: 9999;">
  <div style="background: white; padding: 16px; border-radius: 8px; width: 400px; max-width: 80%; position: relative; overflow: hidden;">
    <button onclick="document.getElementById('modalDetailPenghuni').style.display='none'" 
            style="position: absolute; top: 10px; right: 10px; font-weight: bold; background: none; border: none; font-size: 20px; color: #333;">&times;</button>
    <h3 style="margin-bottom: 12px; font-size: 18px;">Detail Penghuni</h3>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Nama:</strong> <span id="modalNama"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>NIK:</strong> <span id="modalNIK"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Nomor HP:</strong> <span id="modalNoHP"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Kamar:</strong> <span id="modalKamar"></span></p>
    <p style="font-size: 14px; margin-bottom: 8px;"><strong>Status:</strong> <span id="modalStatusPenghuni"></span></p>
  </div>
</div>

<script>
document.querySelectorAll('.row-penghuni').forEach(row => {
  row.addEventListener('click', function() {
    document.getElementById('modalNama').innerText = this.dataset.nama;
    document.getElementById('modalNIK').innerText = this.dataset.nik;
    document.getElementById('modalNoHP').innerText = this.dataset.nohp;
    document.getElementById('modalKamar').innerText = this.dataset.kamar;
    document.getElementById('modalStatusPenghuni').innerText = this.dataset.status;
    document.getElementById('modalDetailPenghuni').style.display = 'flex';
  });
});
</script>
