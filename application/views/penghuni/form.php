<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 40px;"></h2>
<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 20px;">
  <?= isset($penghuni) ? 'Edit Penghuni' : 'Tambah Penghuni' ?>
</h2>

<form method="post" style="max-width: 100%; height: 100%; font-family: Arial, sans-serif; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.06);">
  <!-- Nama -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Nama</label>
    <input type="text" name="nama" value="<?= $penghuni->nama ?? '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
  </div>

  <!-- NIK -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">NIK</label>
    <input type="text" name="nik" value="<?= $penghuni->nik ?? '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
  </div>

  <!-- Nomor HP -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Nomor HP</label>
    <input type="text" name="no_hp" value="<?= $penghuni->no_hp ?? '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
  </div>

  <!-- Pilih Kamar -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Kamar</label>
    <select name="kamar_id" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
      <option value="">-- Pilih Kamar --</option>
      <?php foreach ($kamar as $k): ?>
        <option value="<?= $k->id ?>" <?= (isset($penghuni) && $penghuni->kamar_id == $k->id) ? 'selected' : '' ?>>
          <?= $k->nomor_kamar ?>
        </option>
      <?php endforeach ?>
    </select>
  </div>

  <!-- Tanggal Masuk -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Tanggal Masuk</label>
    <input type="date" name="tanggal_masuk" value="<?= $penghuni->tanggal_masuk ?? '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
  </div>

  <!-- Status -->
  <div style="margin-bottom: 24px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Status</label>
    <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
      <option value="aktif" <?= isset($penghuni) && $penghuni->status == 'aktif' ? 'selected' : '' ?>>Aktif</option>
      <option value="keluar" <?= isset($penghuni) && $penghuni->status == 'keluar' ? 'selected' : '' ?>>Keluar</option>
    </select>
  </div>

  <!-- Tombol Simpan dan Kembali -->
  <button type="submit" style="background-color: #4F46E5; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-size: 14px; font-weight: bold; cursor: pointer; transition: background 0.3s;">
    Simpan
  </button>
  <a href="<?= site_url('penghuni') ?>" style="margin-left: 12px; color: #6B7280; font-size: 14px; text-decoration: none;">Kembali</a>
</form>
