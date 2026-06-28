<div class="topbar">
  <div class="topbar-left">
    <button class="hamburger" onclick="toggleSidebar()" aria-label="Toggle sidebar">
      <i class="ti ti-menu-2" style="font-size:18px"></i>
    </button>
    <h1><?= $pageTitle ?></h1>
  </div>
  <div class="topbar-right">
    <span class="badge <?= $badgeColor ?? 'badge-blue' ?>">
      <?= $badgeText ?? date('F Y') ?>
    </span>
    <div class="av-top">KS</div>
  </div>
</div>