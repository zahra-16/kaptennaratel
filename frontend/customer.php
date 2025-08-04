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
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody id="pelanggan-body">
        <tr>
          <td colspan="9" class="text-center text-muted">Memuat data...</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade" id="modal-pelanggan" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <form class="modal-content" id="form-pelanggan">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Tambah Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body row g-3">
        <input type="hidden" id="pelanggan-id">
        <div class="col-md-6">
          <label for="nama-pelanggan" class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama-pelanggan" required>
        </div>
        <div class="col-md-6">
          <label for="telp-user" class="form-label">No WA</label>
          <input type="text" class="form-control" id="telp-user" required>
        </div>
        <div class="col-md-12">
          <label for="alamat-pelanggan" class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat-pelanggan" rows="2"></textarea>
        </div>
        <div class="col-md-3">
          <label for="rt" class="form-label">RT</label>
          <input type="text" class="form-control" id="rt">
        </div>
        <div class="col-md-3">
          <label for="rw" class="form-label">RW</label>
          <input type="text" class="form-control" id="rw">
        </div>
        <div class="col-md-6">
          <label for="kelurahan-id" class="form-label">Kelurahan ID</label>
          <input type="text" class="form-control" id="kelurahan-id">
        </div>
        <div class="col-md-6">
          <label for="kecamatan" class="form-label">Kecamatan</label>
          <input type="text" class="form-control" id="kecamatan">
        </div>
        <div class="col-md-6">
          <label for="unit-id" class="form-label">Unit</labeL>
          <select class="form-select" id="unit-id" required></select>
        </div>
        <div class="col-md-6">
          <label for="harga-paket-id" class="form-label">Harga Paket</label>
          <select class="form-select" id="harga-paket-id" required></select>
        </div>
        <div class="col-md-6">
          <label for="status-log" class="form-label">Status</label>
          <select class="form-select" id="status-log">
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Nonaktif</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="status-followup" class="form-label">Status Follow-up</label>
          <input type="text" class="form-control" id="status-followup">
        </div>
        <div class="col-md-6">
          <label for="stts-send-survei" class="form-label">Status Survei</label>
          <input type="text" class="form-control" id="stts-send-survei">
        </div>
        <div class="col-md-6">
          <label for="log-aktivasi" class="form-label">Log Aktivasi</label>
          <input type="datetime-local" class="form-control" id="log-aktivasi">
        </div>
        <div class="col-md-6">
          <label for="va-bri" class="form-label">VA BRI</label>
          <input type="text" class="form-control" id="va-bri">
        </div>
        <div class="col-md-6">
          <label for="va-bca" class="form-label">VA BCA</label>
          <input type="text" class="form-control" id="va-bca">
        </div>
        <div class="col-md-6">
          <label for="no-combo" class="form-label">No Combo</label>
          <input type="text" class="form-control" id="no-combo">
        </div>
        <div class="col-md-6">
          <label for="log-username-dcp" class="form-label">Username DCP</label>
          <input type="text" class="form-control" id="log-username-dcp">
        </div>
        <div class="col-md-6">
          <label for="pendaftaran-id" class="form-label">ID Pendaftaran</label>
          <input type="text" class="form-control" id="pendaftaran-id">
        </div>
        <div class="col-md-6">
          <label for="id-telegram" class="form-label">ID Telegram</label>
          <input type="text" class="form-control" id="id-telegram">
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
    getPelanggan, 
    createPelanggan, 
    updatePelanggan, 
    deletePelanggan, 
    getSinglePelanggan 
  } from './api.js/pelanggan.js';
  import { getUnits } from './api.js/units.js';
  import { getHargaPaket } from './api.js/paket.js';

  const pelangganBody = document.getElementById('pelanggan-body');
  const modalPelanggan = new bootstrap.Modal(document.getElementById('modal-pelanggan'));
  const formPelanggan = document.getElementById('form-pelanggan');
  const btnTambah = document.getElementById('btn-tambah');
  const modalLabel = document.getElementById('modalLabel');

  const pelangganId = document.getElementById('pelanggan-id');
  const namaPelanggan = document.getElementById('nama-pelanggan');
  const telpUser = document.getElementById('telp-user');
  const alamatPelanggan = document.getElementById('alamat-pelanggan');
  const rt = document.getElementById('rt');
  const rw = document.getElementById('rw');
  const kelurahanId = document.getElementById('kelurahan-id');
  const kecamatan = document.getElementById('kecamatan');
  const unitId = document.getElementById('unit-id');
  const hargaPaketId = document.getElementById('harga-paket-id');
  const statusLog = document.getElementById('status-log');
  const statusFollowup = document.getElementById('status-followup');
  const sttsSendSurvei = document.getElementById('stts-send-survei');
  const logAktivasi = document.getElementById('log-aktivasi');
  const vaBri = document.getElementById('va-bri');
  const vaBca = document.getElementById('va-bca');
  const noCombo = document.getElementById('no-combo');
  const logUsernameDcp = document.getElementById('log-username-dcp');
  const pendaftaranId = document.getElementById('pendaftaran-id');
  const idTelegram = document.getElementById('id-telegram');

  let units = [];
  let hargaPaket = [];

  function populateSelect(selectElement, data, valueKey, textKey, additionalTextKey = null) {
    selectElement.innerHTML = '<option value="">Pilih...</option>';
    if (!Array.isArray(data) || data.length === 0) {
      console.warn(`Data untuk dropdown #${selectElement.id} kosong atau bukan array. Tidak ada opsi yang ditambahkan.`);
      return;
    }
    data.forEach(item => {
      if (item && item.hasOwnProperty(valueKey) && item.hasOwnProperty(textKey)) {
        const option = document.createElement('option');
        option.value = item[valueKey];
        let text = item[textKey];
        if (additionalTextKey && item.hasOwnProperty(additionalTextKey)) {
          let additionalValue = item[additionalTextKey];
          if (typeof additionalValue === 'number' || (typeof additionalValue === 'string' && !isNaN(parseFloat(additionalValue)))) {
            additionalValue = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(parseFloat(additionalValue));
          }
          text += ` - ${additionalValue}`;
        }
        option.textContent = text;
        selectElement.appendChild(option);
      } else {
        console.warn(`Item data tidak valid untuk dropdown #${selectElement.id}. Item dilewati:`, item);
      }
    });
  }

  async function fetchAndDisplayAllData() {
    pelangganBody.innerHTML = '<tr><td colspan="9" class="text-center text-muted">Memuat data...</td></tr>';
    try {
      const [fetchedUnits, fetchedHargaPaket] = await Promise.all([
        getUnits(),
        getHargaPaket()
      ]);

      units = fetchedUnits;
      hargaPaket = fetchedHargaPaket;

      populateSelect(unitId, units, 'id', 'nama_unit');
      populateSelect(hargaPaketId, hargaPaket, 'log_key', 'alias_paket', 'total_amount');

      const pelangganData = await getPelanggan();
      renderPelangganTable(pelangganData);

    } catch (error) {
      console.error('Terjadi kesalahan fatal saat memuat data utama:', error);
      pelangganBody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Gagal memuat data. Periksa konsol untuk detail.</td></tr>';
    }
  }

  function renderPelangganTable(data) {
    pelangganBody.innerHTML = '';
    if (!Array.isArray(data) || data.length === 0) {
      pelangganBody.innerHTML = '<tr><td colspan="9" class="text-center text-muted">Tidak ada data pelanggan.</td></tr>';
      return;
    }

    data.forEach((pelanggan, index) => {
      const unit = units.find(u => u.id == (pelanggan.unit_id || pelanggan.unit?.id));
      const unitName = unit ? unit.nama_unit : '-';

      const paket = hargaPaket.find(p => p.log_key == (pelanggan.harga_paket_id || pelanggan.harga_paket?.id));
      const packageName = paket ? paket.alias_paket : '-';
      const packageType = paket ? paket.jenis_paket : '-';
      
      const statusBadgeClass = pelanggan.status_log === 'Aktif' ? 'bg-success' : 'bg-secondary';

      const row = `
        <tr>
          <td>${index + 1}</td>
          <td>${pelanggan.nama_pelanggan || '-'}</td>
          <td>${pelanggan.telp_user || pelanggan.telp || '-'}</td>
          <td>${pelanggan.alamat_pelanggan || pelanggan.alamat || '-'}</td>
          <td>${unitName}</td>
          <td><span class="badge ${statusBadgeClass}">${pelanggan.status_log || '-'}</span></td>
          <td>${packageName}</td>
          <td>${packageType}</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Aksi
              </button>
              <ul class="dropdown-menu">
                <li><a href="#" class="dropdown-item text-warning btn-edit" data-id="${pelanggan.id}">Edit</a></li>
                <li><a href="#" class="dropdown-item text-danger btn-delete" data-id="${pelanggan.id}">Hapus</a></li>
              </ul>
            </div>
          </td>
        </tr>
      `;
      pelangganBody.insertAdjacentHTML('beforeend', row);
    });

    addEventListenersToButtons();
  }

  async function fillFormForEdit(id) {
    try {
      const pelanggan = await getSinglePelanggan(id);
      if (!pelanggan) {
        alert('Data pelanggan tidak ditemukan.');
        return;
      }
      
      modalLabel.textContent = 'Edit Pelanggan';
      pelangganId.value = pelanggan.id;
      namaPelanggan.value = pelanggan.nama_pelanggan || '';
      
      telpUser.value = pelanggan.telp_user || pelanggan.telp || '';
      alamatPelanggan.value = pelanggan.alamat_pelanggan || pelanggan.alamat || '';
      
      rt.value = pelanggan.rt || '';
      rw.value = pelanggan.rw || '';
      kelurahanId.value = pelanggan.kelurahan_id || '';
      kecamatan.value = pelanggan.kecamatan || '';

      populateSelect(unitId, units, 'id', 'nama_unit');
      populateSelect(hargaPaketId, hargaPaket, 'log_key', 'alias_paket', 'total_amount');

      unitId.value = pelanggan.unit_id || pelanggan.unit?.id || '';
      hargaPaketId.value = pelanggan.harga_paket_id || pelanggan.harga_paket?.id || '';
      
      statusLog.value = pelanggan.status_log || '';
      statusFollowup.value = pelanggan.status_followup || '';

      sttsSendSurvei.value = pelanggan.stts_send_survei || '';
      
      logAktivasi.value = pelanggan.log_aktivasi ? new Date(pelanggan.log_aktivasi).toISOString().slice(0, 16) : '';
      vaBri.value = pelanggan.va_bri || '';
      vaBca.value = pelanggan.va_bca || '';
      noCombo.value = pelanggan.no_combo || '';
      logUsernameDcp.value = pelanggan.log_username_dcp || '';
      pendaftaranId.value = pelanggan.pendaftaran_id || '';
      idTelegram.value = pelanggan.id_telegram || '';
      
      modalPelanggan.show();
    } catch (error) {
      console.error('Gagal memuat data untuk edit:', error);
      alert('Gagal memuat data pelanggan untuk diedit. Silakan coba lagi.');
    }
  }

  async function handleDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')) {
      try {
        await deletePelanggan(id);
        alert('Pelanggan berhasil dihapus!');
        fetchAndDisplayAllData();
      } catch (error) {
        console.error('Gagal menghapus pelanggan:', error);
        alert('Gagal menghapus pelanggan: ' + error.message);
      }
    }
  }

  function addEventListenersToButtons() {
    document.querySelectorAll('.btn-edit').forEach(button => {
      button.onclick = (e) => {
        e.preventDefault();
        fillFormForEdit(button.dataset.id);
      };
    });
    document.querySelectorAll('.btn-delete').forEach(button => {
      button.onclick = (e) => {
        e.preventDefault();
        handleDelete(button.dataset.id);
      };
    });
  }

  formPelanggan.addEventListener('submit', async (e) => {
    e.preventDefault();

    const data = {
      nama_pelanggan: namaPelanggan.value,
      telp_user: telpUser.value,
      alamat_pelanggan: alamatPelanggan.value,

      rt: rt.value,
      rw: rw.value,
      kelurahan_id: kelurahanId.value,
      kecamatan: kecamatan.value,
      unit_id: unitId.value,
      harga_paket_id: hargaPaketId.value,
      status_log: statusLog.value,
      status_followup: statusFollowup.value,

      stts_send_survei: sttsSendSurvei.value,

      log_aktivasi: logAktivasi.value ? new Date(logAktivasi.value).toISOString() : null,
      va_bri: vaBri.value,
      va_bca: vaBca.value,
      no_combo: noCombo.value,
      log_username_dcp: logUsernameDcp.value,
      pendaftaran_id: pendaftaranId.value,
      id_telegram: idTelegram.value,
    };

    try {
      if (pelangganId.value) {
        await updatePelanggan(pelangganId.value, data);
        alert('Data pelanggan berhasil diperbarui!');
      } else {
        await createPelanggan(data);
        alert('Pelanggan berhasil ditambahkan!');
      }
      modalPelanggan.hide();
      formPelanggan.reset();
      fetchAndDisplayAllData();
    } catch (error) {
      console.error('Gagal menyimpan pelanggan:', error);
      alert('Gagal menyimpan data pelanggan: ' + error.message);
    }
  });

  btnTambah.addEventListener('click', () => {
    modalLabel.textContent = 'Tambah Pelanggan';
    formPelanggan.reset();
    populateSelect(unitId, units, 'id', 'nama_unit');
    populateSelect(hargaPaketId, hargaPaket, 'log_key', 'alias_paket', 'total_amount');
  });

  document.addEventListener('DOMContentLoaded', () => {
    fetchAndDisplayAllData();
  });
</script>

<?php
$content = ob_get_clean();
$title = "Data Pelanggan";
include 'layouts/template.php';
?>