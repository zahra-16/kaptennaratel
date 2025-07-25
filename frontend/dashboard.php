<?php
ob_start(); // mulai tangkap output
?>

<h4 class="fw-bold py-3 mb-4">Dashboard</h4>

<div class="row">
  <!-- Total Pelanggan -->
  <div class="col-md-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Total Pelanggan</h5>
        <h2 class="fw-bold text-primary">123</h2>
      </div>
    </div>
  </div>

  <!-- Pelanggan Aktif -->
  <div class="col-md-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Pelanggan Aktif</h5>
        <h2 class="fw-bold text-success">98</h2>
      </div>
    </div>
  </div>

  <!-- Paket Terpopuler -->
  <div class="col-md-4 col-sm-6 mb-4">
    <div class="card">
      <div class="card-body text-center">
        <h5 class="card-title">Paket Terpopuler</h5>
        <h2 class="fw-bold text-info">Paket Gold</h2>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean(); 
$title = "Dashboard";
include 'layouts/template.php'; 
?>
