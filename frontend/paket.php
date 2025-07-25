<?php
ob_start();
?>

<h4 class="fw-bold py-3 mb-4">Data Paket</h4>

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama Paket</th>
          <th>Harga</th>
          <th>Kecepatan</th>
          <th>Keterangan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="paket-body">
        <tr>
          <td colspan="6" class="text-center">Memuat data...</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script type="module">
  import { getPaket } from '/api.js';

  const tableBody = document.getElementById('paket-body');
  tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Memuat data...</td></tr>';

  getPaket()
    .then(data => {
      if (!Array.isArray(data) || data.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="6" class="text-center">Tidak ada data ditemukan</td></tr>';
        return;
      }

      tableBody.innerHTML = '';
      data.forEach((item, index) => {
        const row = `
          <tr>
            <td>${index + 1}</td>
            <td>${item.nama}</td>
            <td>${item.harga ?? '-'}</td>
            <td>${item.kecepatan ?? '-'}</td>
            <td>${item.keterangan ?? '-'}</td>
            <td>
              <button class="btn btn-sm btn-danger">Hapus</button>
            </td>
          </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
      });
    })
    .catch(err => {
      console.error('Gagal memuat data:', err);
      tableBody.innerHTML = '<tr><td colspan="6" class="text-center text-danger">Gagal memuat data</td></tr>';
    });
</script>

<?php
$content = ob_get_clean();
$title = "Paket";
include 'layouts/template.php';
?>
