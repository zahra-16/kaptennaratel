<?php
  $current = basename($_SERVER['PHP_SELF']);
?>
<aside id="layout-menu" class="layout-menu menu-vertical menu">
  <div class="app-brand demo">
    <a href="dashboard.php" class="app-brand-link">
      <span class="app-brand-logo demo">
        <span class="text-primary">
          <img src="https://i.ibb.co/N2JTNZVh/image.png" alt="Logo" width="130" />
        </span>
      </span>
    </a>
    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="icon-base bx bx-chevron-left"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item<?= $current === 'dashboard.php' ? ' active' : '' ?>">
      <a href="dashboard.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-home"></i>
        <div>Dashboard</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'pendaftar.php' ? ' active' : '' ?>">
      <a href="pendaftar.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-user-check"></i>
        <div>Data Pendaftar</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'statusLokasi.php' ? ' active' : '' ?>">
      <a href="statusLokasi.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-map"></i>
        <div>Status Lokasi</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'layananDigunakan.php' ? ' active' : '' ?>">
      <a href="layananDigunakan.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-cog"></i>
        <div>Layanan</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'tahuLayanan.php' ? ' active' : '' ?>">
      <a href="tahuLayanan.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-question-mark"></i>
        <div>Tahu Layanan</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'alasan.php' ? ' active' : '' ?>">
      <a href="alasan.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-comment-dots"></i>
        <div>Alasan</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'unit.php' ? ' active' : '' ?>">
      <a href="unit.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-building"></i>
        <div>Unit</div>
      </a>
    </li>

    <li class="menu-item <?= $current === 'paket.php' ? 'active' : '' ?>">
      <a href="paket.php" class="menu-link">
        <i class="menu-icon tf-icons bx bx-package"></i>
        <div>Paket</div>
      </a>
    </li>

    <li class="menu-item<?= $current === 'pelanggan.php' ? ' active' : '' ?>">
      <a href="pelanggan.php" class="menu-link">
        <i class="menu-icon icon-base bx bx-user"></i>
        <div>Data Pelanggan</div>
      </a>
    </li>
  </ul>
</aside>

<div class="menu-mobile-toggler d-xl-none rounded-1">
  <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large text-bg-secondary p-2 rounded-1">
    <i class="bx bx-menu icon-base"></i>
    <i class="bx bx-chevron-right icon-base"></i>
  </a>
</div>
