<?php
ob_start();
?>

<h4 class="fw-bold py-3 mb-4">Data Unit</h4>

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama Unit</th>
          <th>Alamat</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="unit-body">
        <tr><td colspan="4" class="text-center">Memuat data...</td></tr>
      </tbody>
    </table>
  </div>
</div>

<script type="module">
  import { getUnits } from '/api.js'; // sesuaikan path jika perlu

  const tableBody = document.getElementById('unit-body');
  tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Memuat data...</td></tr>';

  getUnits()
    .then(data => {
      if (!Array.isArray(data) || data.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="4" class="text-center">Tidak ada data ditemukan</td></tr>';
        return;
      }

      tableBody.innerHTML = '';
      data.forEach((unit, index) => {
        const row = `
          <tr>
            <td>${index + 1}</td>
            <td>${unit.nama}</td>
            <td>${unit.alamat ?? '-'}</td>
            <td>
              <div class="dropdown">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Action
                </button>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item text-danger" href="#">Hapus</a></li>
                </ul>
              </div>
            </td>
          </tr>
        `;
        tableBody.insertAdjacentHTML('beforeend', row);
      });
    })
    .catch(err => {
      console.error('Gagal memuat data:', err);
      tableBody.innerHTML = '<tr><td colspan="4" class="text-center text-danger">Gagal memuat data</td></tr>';
    });
</script>

<?php
$content = ob_get_clean();
$title = "Data Unit";
include 'layouts/template.php';
?>
