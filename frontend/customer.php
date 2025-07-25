<?php
ob_start();
?>

<h4 class="fw-bold py-3 mb-4">Data Pelanggan</h4>

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>No WA</th>
          <th>Alamat</th>
          <th>Unit</th>
          <th>Status</th>
          <th>Paket</th>
          <th>Tipe Paket</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="customer-body">
        <tr>
          <td colspan="9" class="text-center">Memuat data...</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<script type="module">
  import { getCustomers } from '/api.js'; // kamu bisa ganti sesuai file JS-mu

  const tableBody = document.getElementById('customer-body');
  tableBody.innerHTML = '<tr><td colspan="9" class="text-center">Memuat data...</td></tr>';

  getCustomers()
    .then(data => {
      if (!Array.isArray(data) || data.length === 0) {
        tableBody.innerHTML = '<tr><td colspan="9" class="text-center">Tidak ada data ditemukan</td></tr>';
        return;
      }

      tableBody.innerHTML = '';
      data.forEach((item, index) => {
        const row = `
          <tr>
            <td>${index + 1}</td>
            <td>${item.nama_lengkap}</td>
            <td>${item.whatsapp?.nomor ?? '-'}</td>
            <td>${item.alamat}</td>
            <td><span class="badge bg-info">${item.unit?.nama ?? '-'}</span></td>
            <td><span class="badge ${item.status_lokasi?.nama === 'Aktif' ? 'bg-success' : 'bg-secondary'}">
              ${item.status_lokasi?.nama ?? '-'}</span></td>
            <td>${item.layanan_digunakan?.nama ?? '-'}</td>
            <td><span class="badge bg-dark">${item.produk_id ?? '-'}</span></td>
            <td>
              <div class="dropdown">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                  Action
                </button>
                <ul class="dropdown-menu">
                  ${item.foto_ktp ? `<li><a class="dropdown-item" href="/uploads/${item.foto_ktp}" target="_blank">Foto KTP</a></li>` : ''}
                  ${item.foto_kk ? `<li><a class="dropdown-item" href="/uploads/${item.foto_kk}" target="_blank">Foto KK</a></li>` : ''}
                  ${item.foto_rmh ? `<li><a class="dropdown-item" href="/uploads/${item.foto_rmh}" target="_blank">Foto Rumah</a></li>` : ''}
                  <li><a class="dropdown-item" href="https://wa.me/${item.whatsapp?.nomor ?? ''}" target="_blank">Whatsapp</a></li>
                  <li><a class="dropdown-item" href="https://maps.google.com/?q=${item.longlat}" target="_blank">Maps</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item text-danger" href="#">Delete</a></li>
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
      tableBody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Gagal memuat data</td></tr>';
    });
</script>

<?php
$content = ob_get_clean();
$title = "Data Pelanggan";
include 'layouts/template.php';
?>
