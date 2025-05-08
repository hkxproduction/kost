<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Aplikasi Kost</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #F3F4F6;
    }

    .wrapper {
      display: flex;
    }

    .sidebar {
      width: 220px;
      background-color: #111827;
      min-height: 100vh;
      padding: 20px;
      position: fixed;
      top: 0;
      left: 0;
      transition: transform 0.3s ease;
      z-index: 999;
    }

    .sidebar.closed {
      transform: translateX(-100%);
    }

    .sidebar a {
      display: block;
      color: white;
      text-decoration: none;
      margin-bottom: 20px;
      font-weight: 500;
      padding: 10px 15px;
      border-radius: 8px;
      transition: background 0.2s;
    }

    .sidebar a:hover {
      background-color: #374151;
    }

    .content {
      margin-left: 220px;
      flex: 1;
      padding: 30px;
      transition: margin-left 0.3s ease;
    }

    .content.full {
      margin-left: 0;
    }

    .toggle-btn {
      position: fixed;
      top: 20px;
      left: 240px;
      z-index: 1001;
      background-color: #111827;
      color: white;
      border: none;
      padding: 10px 12px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .sidebar.closed + .toggle-btn {
      left: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border-bottom: 1px solid #E5E7EB;
      padding: 12px;
      text-align: left;
    }

    th {
      background-color: #F9FAFB;
    }

    @media (max-width: 768px) {
      .sidebar {
        transform: translateX(-100%);
      }

      .content {
        margin-left: 0;
      }

      .toggle-btn {
        left: 20px !important;
      }
    }
  </style>
</head>
<body>

  <div class="wrapper">
    <div class="sidebar" id="sidebar">
      <a href="<?= site_url('kamar') ?>">🏠 Kamar</a>
      <a href="<?= site_url('penghuni') ?>">👤 Penghuni</a>
      <a href="<?= site_url('pembayaran') ?>">💳 Pembayaran</a>
    </div>

    <button class="toggle-btn" id="toggleBtn" onclick="toggleSidebar()">☰</button>

    <div class="content" id="content">
      <?php $this->load->view($content_view); ?>
    </div>
  </div>

  <script>
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const toggleBtn = document.getElementById('toggleBtn');

    function toggleSidebar() {
      sidebar.classList.toggle('closed');
      content.classList.toggle('full');

      if (sidebar.classList.contains('closed')) {
        toggleBtn.style.left = '20px';
      } else {
        toggleBtn.style.left = '240px';
      }
    }
  </script>

</body>
</html>
