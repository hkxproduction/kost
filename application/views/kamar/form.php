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
    <input type="text" id="harga" name="harga" value="<?= isset($kamar) ? number_format($kamar->harga, 0, ',', '.') : '' ?>" required 
          style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px;"/>
  </div>

  <!-- Input Gambar with Preview -->
  <div style="margin-bottom: 16px;">
    <label style="display: block; margin-bottom: 6px; color: #374151; font-weight: 600;">Gambar Kamar (maks. 6 gambar)</label>
    <input type="file" name="gambar[]" id="gambar" accept="image/*" multiple 
          style="width: 100%; padding: 10px 14px; border: 1px solid #D1D5DB; border-radius: 6px; font-size: 14px; color: #6B7280;" 
          onchange="previewImages()" />
    <small style="color: #6B7280;">Ukuran maksimal tiap gambar: 2MB, format: JPG, PNG, GIF</small>
    <div id="imagePreview" style="margin-top: 10px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
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
  function previewImages() {
    const files = document.getElementById('gambar').files;
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';

    if (files.length > 6) {
      alert('Maksimal upload 6 gambar.');
      document.getElementById('gambar').value = ''; // Reset input
      return;
    }

    Array.from(files).forEach(file => {
      if (file.size > 2 * 1024 * 1024) {
        alert(`File "${file.name}" terlalu besar (maks 2MB).`);
        return;
      }

      const reader = new FileReader();
      reader.onload = function(e) {
        const img = document.createElement('img');
        img.src = e.target.result;
        img.style.maxWidth = '150px';
        img.style.maxHeight = '150px';
        img.style.borderRadius = '8px';
        img.style.objectFit = 'cover';
        preview.appendChild(img);
      };
      reader.readAsDataURL(file);
    });
  }

  const hargaInput = document.getElementById('harga');
  hargaInput.addEventListener('keyup', function(e) {
    let value = this.value.replace(/[^\d]/g, '');
    this.value = new Intl.NumberFormat('id-ID').format(value);
  });
</script>
