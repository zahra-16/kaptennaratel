<?php
ob_start();
?>

<h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
  Data Unit
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modal-unit" id="btn-tambah">
    + Tambah Unit
  </button>
</h4>

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama Unit</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="unit-body">
        <tr><td colspan="3" class="text-center">Memuat data...</td></tr>
      </tbody>
    </table>
  </div>
</div>  

<!-- Modal -->
<div class="modal fade" id="modal-unit" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="form-unit">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Tambah Unit</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="unit-id">
        <div class="mb-3">
          <label for="nama-unit" class="form-label">Nama Unit</label>
          <input type="text" class="form-control" id="nama-unit" required>
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
  import { getUnits, deleteUnit, createUnit, updateUnit } from './api.js';

  const tableBody = document.getElementById('unit-body');
  const modal = new bootstrap.Modal(document.getElementById('modal-unit'));
  const form = document.getElementById('form-unit');
  const namaUnit = document.getElementById('nama-unit');
  const unitId = document.getElementById('unit-id');
  const modalLabel = document.getElementById('modalLabel');

  function renderUnits() {
    getUnits()
      .then(data => {
        tableBody.innerHTML = '';
        if (!Array.isArray(data) || data.length === 0) {
          tableBody.innerHTML = '<tr><td colspan="3" class="text-center">Tidak ada data ditemukan</td></tr>';
          return;
        }

        data.forEach((unit, index) => {
          const row = `
            <tr>
              <td>${index + 1}</td>
              <td>${unit.nama_unit}</td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Action
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#" class="dropdown-item text-warning btn-edit" data-id="${unit.id}" data-nama="${unit.nama_unit}">Edit</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown-item text-danger btn-delete" data-id="${unit.id}">Hapus</a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          `;
          tableBody.insertAdjacentHTML('beforeend', row);
        });

        // Delete
        document.querySelectorAll('.btn-delete').forEach(btn => {
          btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const id = btn.dataset.id;
            if (confirm('Yakin ingin menghapus unit ini?')) {
              try {
                await deleteUnit(id);
                renderUnits();
              } catch (err) {
                alert('Gagal menghapus');
              }
            }
          });
        });

        // Edit
        document.querySelectorAll('.btn-edit').forEach(btn => {
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            unitId.value = btn.dataset.id;
            namaUnit.value = btn.dataset.nama;
            modalLabel.textContent = 'Edit Unit';
            modal.show();
          });
        });
      })
      .catch(err => {
        console.error('Gagal memuat data:', err);
        tableBody.innerHTML = '<tr><td colspan="3" class="text-center text-danger">Gagal memuat data</td></tr>';
      });
  }

  document.getElementById('btn-tambah').addEventListener('click', () => {
    unitId.value = '';
    namaUnit.value = '';
    modalLabel.textContent = 'Tambah Unit';
  });

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const id = unitId.value;
    const data = { nama_unit: namaUnit.value };

    try {
      if (id) {
        await updateUnit(id, data);
      } else {
        await createUnit(data);
      }
      modal.hide();
      renderUnits();
    } catch (err) {
      alert('Gagal menyimpan data');
      console.error(err);
    }
  });

  renderUnits();
</script>

<?php
$content = ob_get_clean();
$title = "Data Unit";
include 'layouts/template.php';
?>
