<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 20px;">
  <?= isset($kamar) ? 'Edit Kamar' : 'Tambah Kamar' ?>
</h2>

<form method="post" action="" style="max-width: 500px; font-family: Arial, sans-serif; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.06);">
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Nomor Kamar</label>
    <input type="text" name="nomor_kamar" value="<?= isset($kamar) ? $kamar->nomor_kamar : '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;"/>
  </div>

  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Tipe</label>
    <input type="text" name="tipe" value="<?= isset($kamar) ? $kamar->tipe : '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;"/>
  </div>

  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Harga</label>
    <input type="number" name="harga" value="<?= isset($kamar) ? $kamar->harga : '' ?>" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;"/>
  </div>

  <div style="margin-bottom: 24px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Status</label>
    <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
      <option value="Tersedia" <?= isset($kamar) && $kamar->status == 'Tersedia' ? 'selected' : '' ?>>Tersedia</option>
      <option value="Tidak Tersedia" <?= isset($kamar) && $kamar->status == 'Tidak Tersedia' ? 'selected' : '' ?>>Tidak Tersedia</option>
    </select>
  </div>

  <button type="submit" style="background-color: #4F46E5; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-size: 14px; font-weight: bold; cursor: pointer; transition: background 0.3s;">
    Simpan
  </button>

  <a href="<?= site_url('kamar') ?>" style="margin-left: 12px; color: #6B7280; font-size: 14px; text-decoration: none;">Kembali</a>
</form>
