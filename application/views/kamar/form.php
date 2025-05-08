<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 40px;"></h2>
<h2 style="font-family: Arial, sans-serif; font-size: 24px; color: #333; margin-bottom: 20px;">
  <?= isset($kamar) ? 'Edit Kamar' : 'Tambah Kamar' ?>
</h2>

<form method="post" action="" enctype="multipart/form-data" style="max-width: 100%; height: 100%; font-family: Arial, sans-serif; background: #fff; padding: 24px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.06);">
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

  <!-- Input Gambar with Preview -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Gambar Kamar</label>
    <input type="file" name="gambar" id="gambar" style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px; color: #6B7280;" onchange="previewImage()"/>
    <small style="color: #6B7280;">Ukuran maksimal gambar: 2MB, format: JPG, PNG, GIF</small>
    <div id="imagePreview" style="margin-top: 10px;">
      <!-- Image Preview will appear here -->
    </div>
  </div>

  <!-- Fasilitas Text Input -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Fasilitas</label>
    <textarea name="fasilitas" rows="4" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px; resize: vertical;"></textarea>
  </div>

  <div style="margin-bottom: 24px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Status</label>
    <select name="status" required style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;">
      <option value="kosong" <?= isset($kamar) && $kamar->status == 'kosong' ? 'selected' : '' ?>>Tersedia</option>
      <option value="terisi" <?= isset($kamar) && $kamar->status == 'terisi' ? 'selected' : '' ?>>Tidak Tersedia</option>
    </select>
  </div>

  <button type="submit" style="background-color: #4F46E5; color: white; padding: 10px 20px; border: none; border-radius: 6px; font-size: 14px; font-weight: bold; cursor: pointer; transition: background 0.3s;">
    Simpan
  </button>

  <a href="<?= site_url('kamar') ?>" style="margin-left: 12px; color: #6B7280; font-size: 14px; text-decoration: none;">Kembali</a>
</form>

<script>
  function previewImage() {
    const file = document.getElementById('gambar').files[0];
    const reader = new FileReader();
    const imagePreview = document.getElementById('imagePreview');
    
    if (file) {
      reader.onload = function(e) {
        imagePreview.innerHTML = `<img src="${e.target.result}" alt="Image Preview" style="max-width: 100%; max-height: 300px; border-radius: 8px; margin-top: 10px;" />`;
      };
      reader.readAsDataURL(file);
    } else {
      imagePreview.innerHTML = '';
    }
  }
</script>
