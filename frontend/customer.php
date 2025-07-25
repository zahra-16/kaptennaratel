<?php
ob_start();
?>

<h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
  Data Pelanggan
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-pelanggan" id="btn-tambah">
    + Tambah Pelanggan
  </button>
</h4>

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
        <tr><td colspan="9" class="text-center">Memuat data...</td></tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah/Edit Pelanggan -->
<div class="modal fade" id="modal-pelanggan" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="form-pelanggan">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Tambah Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="pelanggan-id">
        <div class="mb-3">
          <label for="nama-pelanggan" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama-pelanggan" required>
        </div>
        <div class="mb-3">
          <label for="telp" class="form-label">No WA</label>
          <input type="text" class="form-control" id="telp" required>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat" rows="2"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </form>
  </div>
</div>

<script type="module">
  import { getPelanggan, deletePelanggan, updatePelanggan, createPelanggan } from '/api.js/pelanggan';

  const tableBody = document.getElementById('customer-body');
  const modal = new bootstrap.Modal(document.getElementById('modal-pelanggan'));
  const form = document.getElementById('form-pelanggan');
  const pelangganId = document.getElementById('pelanggan-id');
  const namaInput = document.getElementById('nama-pelanggan');
  const telpInput = document.getElementById('telp');
  const alamatInput = document.getElementById('alamat');
  const modalLabel = document.getElementById('modalLabel');

  function loadData() {
    tableBody.innerHTML = '<tr><td colspan="9" class="text-center">Memuat data...</td></tr>';

    getPelanggan()
      .then(data => {
        tableBody.innerHTML = '';
        if (!Array.isArray(data) || data.length === 0) {
          tableBody.innerHTML = '<tr><td colspan="9" class="text-center">Tidak ada data ditemukan</td></tr>';
          return;
        }

        data.forEach((item, index) => {
          const row = `
            <tr>
              <td>${index + 1}</td>
              <td>${item.nama_pelanggan ?? '-'}</td>
              <td>${item.telp ?? '-'}</td>
              <td>${item.alamat ?? '-'}</td>
              <td><span class="badge bg-info">${item.unit?.nama ?? '-'}</span></td>
              <td><span class="badge ${item.status_log === 'Aktif' ? 'bg-success' : 'bg-secondary'}">${item.status_log}</span></td>
              <td>${item.harga_paket?.alias_paket ?? '-'}</td>
              <td><span class="badge bg-dark">${item.harga_paket?.jenis_paket ?? '-'}</span></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">Action</button>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item text-warning btn-edit" href="#" 
                        data-id="${item.id}" 
                        data-nama="${item.nama_pelanggan}" 
                        data-telp="${item.telp}" 
                        data-alamat="${item.alamat}">Edit</a></li>
                    <li><a class="dropdown-item text-danger btn-delete" href="#" data-id="${item.id}">Delete</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="https://wa.me/${item.telp}" target="_blank">Whatsapp</a></li>
                    <li><a class="dropdown-item" href="https://maps.google.com/?q=${item.longlat ?? ''}" target="_blank">Maps</a></li>
                  </ul>
                </div>
              </td>
            </tr>`;
          tableBody.insertAdjacentHTML('beforeend', row);
        });

        // Delete
        document.querySelectorAll('.btn-delete').forEach(btn => {
          btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const id = btn.dataset.id;
            if (confirm('Yakin ingin menghapus pelanggan ini?')) {
              await deletePelanggan(id);
              loadData();
            }
          });
        });

        // Edit
        document.querySelectorAll('.btn-edit').forEach(btn => {
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            pelangganId.value = btn.dataset.id;
            namaInput.value = btn.dataset.nama;
            telpInput.value = btn.dataset.telp;
            alamatInput.value = btn.dataset.alamat;
            modalLabel.textContent = 'Edit Pelanggan';
            modal.show();
          });
        });
      })
      .catch(err => {
        console.error('Gagal memuat data:', err);
        tableBody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Gagal memuat data</td></tr>';
      });
  }

  // Tombol Tambah
  document.getElementById('btn-tambah').addEventListener('click', () => {
    pelangganId.value = '';
    namaInput.value = '';
    telpInput.value = '';
    alamatInput.value = '';
    modalLabel.textContent = 'Tambah Pelanggan';
  });

  // Submit Form Tambah/Edit
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = pelangganId.value;
    const data = {
      nama_pelanggan: namaInput.value,
      telp: telpInput.value,
      alamat: alamatInput.value
    };

    try {
      if (id) {
        await updatePelanggan(id, data);
      } else {
        await createPelanggan(data);
      }
      modal.hide();
      loadData();
    } catch (err) {
      alert('Gagal menyimpan data');
      console.error(err);
    }
  });

  // Load awal
  loadData();
</script>

<?php
$content = ob_get_clean();
$title = "Data Pelanggan";
include 'layouts/template.php';
?>
