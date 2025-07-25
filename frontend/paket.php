<?php
ob_start();
?>

<h4 class="fw-bold py-3 mb-4 d-flex justify-content-between align-items-center">
  Data Paket
  <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#paketModal" id="btn-tambah">
    + Tambah Paket
  </button>
</h4>

<div class="card">
  <div class="card-datatable table-responsive">
    <table class="table table-bordered">
      <thead class="table-light">
        <tr>
          <th>No</th>
          <th>Nama Paket</th>
          <th>Harga</th>
          <th>DPP</th>
          <th>PPN</th>
          <th>Margin</th>
          <th>Kecepatan</th>
          <th>Keterangan</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="paket-body">
        <tr>
          <td colspan="10" class="text-center">Memuat data...</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Tambah/Edit -->
<div class="modal fade" id="paketModal" tabindex="-1" aria-labelledby="paketModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form class="modal-content" id="paket-form">
      <div class="modal-header">
        <h5 class="modal-title" id="paketModalLabel">Tambah Paket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="paket-id">
        <input type="hidden" id="ref_gol" value="G3">
        <input type="hidden" id="create_log" value="<?= date('Y-m-d H:i:s') ?>">

        <div class="mb-3">
          <label class="form-label">Nama Paket</label>
          <input type="text" class="form-control" id="alias_paket" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" class="form-control" id="total_amount" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Kecepatan</label>
          <input type="text" class="form-control" id="paket">
        </div>
        <div class="mb-3">
          <label class="form-label">Keterangan</label>
          <input type="text" class="form-control" id="jenis_paket">
        </div>
        <div class="mb-3">
          <label class="form-label">DPP</label>
          <input type="number" class="form-control" id="dpp">
        </div>
        <div class="mb-3">
          <label class="form-label">PPN</label>
          <input type="number" class="form-control" id="ppn">
        </div>
        <div class="mb-3">
          <label class="form-label">Margin</label>
          <input type="number" class="form-control" id="margin">
        </div>
        <div class="mb-3">
          <label class="form-label">Status</label>
          <select class="form-control" id="status">
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Nonaktif</option>
          </select>
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
  import {
    getHargaPaket,
    createHargaPaket,
    updateHargaPaket,
    deleteHargaPaket,
  } from '/api.js/paket';

  const tableBody = document.getElementById('paket-body');
  const btnTambah = document.getElementById('btn-tambah');
  const modal = new bootstrap.Modal(document.getElementById('paketModal'));
  const form = document.getElementById('paket-form');

  const aliasInput = document.getElementById('alias_paket');
  const hargaInput = document.getElementById('total_amount');
  const paketInput = document.getElementById('paket');
  const ketInput = document.getElementById('jenis_paket');
  const dppInput = document.getElementById('dpp');
  const ppnInput = document.getElementById('ppn');
  const marginInput = document.getElementById('margin');
  const statusInput = document.getElementById('status');
  const idInput = document.getElementById('paket-id');
  const refGolInput = document.getElementById('ref_gol');
  const createLogInput = document.getElementById('create_log');
  const modalLabel = document.getElementById('paketModalLabel');

  let editMode = false;

  function loadData() {
    tableBody.innerHTML = '<tr><td colspan="10" class="text-center">Memuat data...</td></tr>';
    getHargaPaket()
      .then(data => {
        if (!Array.isArray(data) || data.length === 0) {
          tableBody.innerHTML = '<tr><td colspan="10" class="text-center">Tidak ada data ditemukan</td></tr>';
          return;
        }

        tableBody.innerHTML = '';
        data.forEach((item, index) => {
          const row = `
            <tr>
              <td>${index + 1}</td>
              <td>${item.alias_paket}</td>
              <td>Rp ${parseFloat(item.total_amount).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.dpp).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.ppn).toLocaleString()}</td>
              <td>Rp ${parseFloat(item.margin).toLocaleString()}</td>
              <td>${item.paket?.trim() || '-'}</td>
              <td>${item.jenis_paket || '-'}</td>
              <td><span class="badge bg-${item.status === 'aktif' ? 'success' : 'secondary'}">${item.status}</span></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Action
                  </button>
                  <ul class="dropdown-menu">
                    <li>
                      <a href="#" class="dropdown-item text-warning btn-edit" data-id="${item.log_key}">Edit</a>
                    </li>
                    <li>
                      <a href="#" class="dropdown-item text-danger btn-delete" data-id="${item.log_key}">Hapus</a>
                    </li>
                  </ul>
                </div>
              </td>
            </tr>
          `;
          tableBody.insertAdjacentHTML('beforeend', row);
        });

        document.querySelectorAll('.btn-edit').forEach(btn => {
          btn.addEventListener('click', (e) => {
            e.preventDefault();
            const id = btn.dataset.id;
            const item = data.find(d => d.log_key == id);
            if (item) {
              idInput.value = item.log_key;
              aliasInput.value = item.alias_paket;
              hargaInput.value = item.total_amount;
              paketInput.value = item.paket?.trim();
              ketInput.value = item.jenis_paket;
              dppInput.value = item.dpp;
              ppnInput.value = item.ppn;
              marginInput.value = item.margin;
              statusInput.value = item.status;
              editMode = true;
              modalLabel.textContent = 'Edit Paket';
              modal.show();
            }
          });
        });

        document.querySelectorAll('.btn-delete').forEach(btn => {
          btn.addEventListener('click', async (e) => {
            e.preventDefault();
            const id = btn.dataset.id;
            if (confirm('Yakin ingin menghapus data ini?')) {
              await deleteHargaPaket(id);
              loadData();
            }
          });
        });
      })
      .catch(err => {
        console.error('Gagal memuat data:', err);
        tableBody.innerHTML = '<tr><td colspan="10" class="text-center text-danger">Gagal memuat data</td></tr>';
      });
  }

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const payload = {
      alias_paket: aliasInput.value,
      total_amount: hargaInput.value,
      paket: paketInput.value,
      jenis_paket: ketInput.value,
      dpp: dppInput.value,
      ppn: ppnInput.value,
      margin: marginInput.value,
      status: statusInput.value,
      ref_gol: refGolInput.value,
      create_log: createLogInput.value,
    };

    try {
      if (editMode) {
        await updateHargaPaket(idInput.value, payload);
      } else {
        await createHargaPaket(payload);
      }
      modal.hide();
      form.reset();
      editMode = false;
      loadData();
    } catch (err) {
      alert('Terjadi kesalahan: ' + err.message);
    }
  });

  btnTambah.addEventListener('click', () => {
    form.reset();
    idInput.value = '';
    editMode = false;
    modalLabel.textContent = 'Tambah Paket';
  });

  loadData();
</script>

<?php
$content = ob_get_clean();
$title = "Data Paket";
include 'layouts/template.php';
?>
