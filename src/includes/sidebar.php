<div class="overlay" id="overlay" onclick="toggleSidebar()"></div>

<div class="sidebar" id="sidebar">
  <div class="sidebar-brand">
    <div class="brand-icon"><i class="ti ti-wallet"></i></div>
    <div class="brand-text"><h2>KasSederhana</h2><p>Manajemen Kas</p></div>
  </div>
  <div class="nav-section">
    <div class="nav-label">Menu</div>
    <a class="nav-item <?= ($activeMenu==='dashboard')  ? 'active' : '' ?>" href="dashboard.php">
      <i class="ti ti-layout-dashboard"></i> Dashboard
    </a>
    <a class="nav-item <?= ($activeMenu==='transaksi')  ? 'active' : '' ?>" href="transaksi.php">
      <i class="ti ti-list"></i> Transaksi
    </a>
    <a class="nav-item <?= ($activeMenu==='tambah')     ? 'active' : '' ?>" href="tambah.php">
      <i class="ti ti-plus"></i> Tambah Transaksi
    </a>
  </div>
  <div class="sidebar-footer">
    <div class="av">KS</div>
    <div><p>Admin</p><span>kas@sederhana.id</span></div>
  </div>
</div>