<?php
// Pastikan ob_start() hanya dipanggil sekali di awal file PHP ini
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
      <tbody id="pelanggan-body">
        <tr>
          <td colspan="9" class="text-center">Memuat data...</td>
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
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" id="nama-pelanggan" required>
        </div>
        <div class="col-md-6">
          <label class="form-label">No WA</label>
          <input type="text" class="form-control" id="telp-user" required>
        </div>
        <div class="col-md-12">
          <label class="form-label">Alamat</label>
          <textarea class="form-control" id="alamat-pelanggan" rows="2"></textarea>
        </div>
        <div class="col-md-3">
          <label class="form-label">RT</label>
          <input type="text" class="form-control" id="rt">
        </div>
        <div class="col-md-3">
          <label class="form-label">RW</label>
          <input type="text" class="form-control" id="rw">
        </div>
        <div class="col-md-6">
          <label class="form-label">Kelurahan ID</label>
          <input type="text" class="form-control" id="kelurahan-id">
        </div>
        <div class="col-md-6">
          <label class="form-label">Kecamatan</label>
          <input type="text" class="form-control" id="kecamatan">
        </div>
        <div class="col-md-6">
          <label class="form-label">Unit</labeL>
          <select class="form-select" id="unit-id" required></select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Harga Paket</label>
          <select class="form-select" id="harga-paket-id" required></select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Status</label>
          <select class="form-select" id="status-log">
            <option value="Aktif">Aktif</option>
            <option value="Nonaktif">Nonaktif</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label">Status Follow-up</label>
          <input type="text" class="form-control" id="status-followup">
        </div>
        <div class="col-md-6">
          <label class="form-label">Status Survei</label>
          <input type="text" class="form-control" id="stts-send-survei">
        </div>
        <div class="col-md-6">
          <label class="form-label">Log Aktivasi</label>
          <input type="datetime-local" class="form-control" id="log-aktivasi">
        </div>
        <div class="col-md-6">
          <label class="form-label">VA BRI</label>
          <input type="text" class="form-control" id="va-bri">
        </div>
        <div class="col-md-6">
          <label class="form-label">VA BCA</label>
          <input type="text" class="form-control" id="va-bca">
        </div>
        <div class="col-md-6">
          <label class="form-label">No Combo</label>
          <input type="text" class="form-control" id="no-combo">
        </div>
        <div class="col-md-6">
          <label class="form-label">Username DCP</label>
          <input type="text" class="form-control" id="log-username-dcp">
        </div>
        <div class="col-md-6">
          <label class="form-label">ID Pendaftaran</label>
          <input type="text" class="form-control" id="pendaftaran-id">
        </div>
        <div class="col-md-6">
          <label class="form-label">ID Telegram</label>
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
  // Impor fungsi-fungsi API
  // PASTIKAN PATH INI SESUAI DENGAN LOKASI FILE API ANDA
  import { getPelanggan, createPelanggan, updatePelanggan, deletePelanggan, getSinglePelanggan } from './api.js/pelanggan.js';
  import { getUnits } from './api.js/units.js';
  import { getHargaPaket } from './api.js/paket.js';

  // --- Fungsi untuk logging konsol berwarna dan lebih terstruktur ---
  function logDebug(message, ...args) {
      console.log(`%cDEBUG: ${message}`, 'color: #1a73e8; font-weight: bold;', ...args);
  }
  function logWarn(message, ...args) {
      console.warn(`%cWARN: ${message}`, 'color: orange; font-weight: bold;', ...args);
  }
  function logError(message, ...args) {
      console.error(`%cERROR: ${message}`, 'color: red; font-weight: bold;', ...args);
  }
  function logInfo(message, ...args) {
      console.info(`%cINFO: ${message}`, 'color: dodgerblue;', ...args);
  }
  function logSuccess(message, ...args) {
    console.log(`%cSUCCESS: ${message}`, 'color: green; font-weight: bold;', ...args);
  }

  // Ambil Elemen DOM
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

  /**
   * Mengambil data pelanggan, data unit, dan data paket, lalu merender tabel.
   * Ini adalah fungsi utama yang dipanggil saat halaman dimuat dan setelah CRUD.
   */
  async function fetchAndDisplayPelanggan() {
    pelangganBody.innerHTML = '<tr><td colspan="9" class="text-center">Memuat data...</td></tr>';
    try {
      logInfo('Memulai pengambilan data units dan harga paket secara paralel...');
      
      // Ambil data units dan hargaPaket secara paralel.
      // Ini memastikan data master untuk dropdown dan lookup selalu tersedia.
      const [fetchedUnits, fetchedHargaPaket] = await Promise.all([
        getUnits(),
        getHargaPaket()
      ]);

      // Simpan data ke variabel global
      units = fetchedUnits;
      hargaPaket = fetchedHargaPaket;

      logSuccess('Data Units berhasil diambil:', units);
      logSuccess('Data Harga Paket berhasil diambil:', hargaPaket);
      
      // Setelah data master diambil, baru isi dropdown di modal.
      // Ini penting agar dropdown punya opsi saat modal dibuka pertama kali.
      populateSelect(unitId, units, 'id', 'nama_unit');
      populateSelect(hargaPaketId, hargaPaket, 'id', 'alias_paket', 'total_amount');

      logInfo('Memulai pengambilan data pelanggan...');
      const pelangganData = await getPelanggan();
      logSuccess('Data Pelanggan berhasil diambil:', pelangganData);
      renderPelangganTable(pelangganData);

    } catch (error) {
      logError('Terjadi kesalahan fatal saat memuat data utama (pelanggan/unit/paket):', error);
      pelangganBody.innerHTML = '<tr><td colspan="9" class="text-center text-danger">Gagal memuat data pelanggan. Periksa konsol (F12) untuk detail lebih lanjut.</td></tr>';
      alert('Terjadi kesalahan saat memuat data: ' + (error.message || 'Terjadi kesalahan tidak diketahui') + '. Silakan periksa konsol browser (F12) untuk detail lebih lanjut.');
    }
  }

  /**
   * Merender data pelanggan ke dalam body tabel.
   * @param {Array} data - Array objek pelanggan.
   */
  function renderPelangganTable(data) {
    pelangganBody.innerHTML = '';
    if (!Array.isArray(data) || data.length === 0) {
      logInfo('Tidak ada data pelanggan untuk ditampilkan.');
      pelangganBody.innerHTML = '<tr><td colspan="9" class="text-center">Tidak ada data pelanggan.</td></tr>';
      return;
    }

    data.forEach((pelanggan, index) => {
      // --- PERBAIKAN PENTING UNTUK UNIT DI TABEL ---
      // Prioritas: 1. pelanggan.unit.nama_unit (jika API pelanggan mengembalikan objek unit bersarang)
      //            2. Cari di array 'units' global berdasarkan pelanggan.unit_id
      //            3. Default ke '-'
      let unitName = '-';
      if (pelanggan.unit && pelanggan.unit.nama_unit) {
          unitName = pelanggan.unit.nama_unit;
      } else if (pelanggan.unit_id) {
          const foundUnit = units.find(u => u.id == pelanggan.unit_id);
          if (foundUnit) {
              unitName = foundUnit.nama_unit;
          } else {
              logWarn(`Unit ID '${pelanggan.unit_id}' ditemukan di data pelanggan tetapi tidak ditemukan di daftar unit master.`);
          }
      }

      // --- PERBAIKAN PENTING UNTUK PAKET DI TABEL ---
      // Prioritas: 1. pelanggan.harga_paket.alias_paket / .jenis_paket (jika API pelanggan mengembalikan objek harga_paket bersarang)
      //            2. Cari di array 'hargaPaket' global berdasarkan pelanggan.harga_paket_id
      //            3. Default ke '-'
      let packageName = '-';
      let packageType = '-';
      if (pelanggan.harga_paket && pelanggan.harga_paket.alias_paket) {
          packageName = pelanggan.harga_paket.alias_paket;
          packageType = pelanggan.harga_paket.jenis_paket || '-'; // Pastikan jenis_paket juga ada
      } else if (pelanggan.harga_paket_id) {
          const foundPackage = hargaPaket.find(hp => hp.id == pelanggan.harga_paket_id);
          if (foundPackage) {
              packageName = foundPackage.alias_paket;
              packageType = foundPackage.jenis_paket || '-'; // Fallback jika jenis_paket tidak ada di data paket master
          } else {
              logWarn(`Harga Paket ID '${pelanggan.harga_paket_id}' ditemukan di data pelanggan tetapi tidak ditemukan di daftar harga paket master.`);
          }
      }
      
      const statusBadgeClass = pelanggan.status_log === 'Aktif' ? 'bg-success' : 'bg-secondary';

      const row = `
        <tr>
          <td>${index + 1}</td>
          <td>${pelanggan.nama_pelanggan || '-'}</td>
          <td>${pelanggan.telp || '-'}</td>
          <td>${pelanggan.alamat || '-'}</td>
          <td>${unitName}</td>
          <td><span class="badge ${statusBadgeClass}">${pelanggan.status_log || '-'}</span></td>
          <td>${packageName}</td>
          <td>${packageType}</td>
          <td>
            <div class="dropdown">
              <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Action
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
    logDebug('Tabel pelanggan berhasil dirender.');
  }

  /**
   * Mengisi elemen select (dropdown) dengan opsi dari array objek.
   * @param {HTMLSelectElement} selectElement - Elemen select yang akan diisi.
   * @param {Array} data - Array objek yang berisi data opsi.
   * @param {string} valueKey - Kunci dalam setiap objek yang akan digunakan untuk nilai opsi.
   * @param {string} textKey - Kunci dalam setiap objek yang akan digunakan untuk teks tampilan opsi.
   * @param {string|null} additionalTextKey - Kunci opsional untuk teks tambahan dalam tampilan (misalnya, 'harga').
   */
  function populateSelect(selectElement, data, valueKey, textKey, additionalTextKey = null) {
    selectElement.innerHTML = '<option value="">Pilih...</option>'; 
    if (!Array.isArray(data) || data.length === 0) {
        logWarn(`Data untuk dropdown ${selectElement.id} kosong atau bukan array. Tidak ada opsi yang akan ditambahkan. Data received:`, data);
        return;
    }
    data.forEach(item => {
      // Pastikan item dan kunci yang dibutuhkan ada sebelum mencoba mengaksesnya
      if (item && item.hasOwnProperty(valueKey) && item.hasOwnProperty(textKey)) {
        const option = document.createElement('option');
        option.value = item[valueKey];
        let text = item[textKey];
        
        // Menambahkan teks tambahan jika ada dan propertinya valid
        if (additionalTextKey && item.hasOwnProperty(additionalTextKey)) {
          let additionalValue = item[additionalTextKey];
          // Format sebagai mata uang jika numeric
          if (typeof additionalValue === 'number' || (typeof additionalValue === 'string' && !isNaN(parseFloat(additionalValue)))) {
            additionalValue = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(parseFloat(additionalValue));
          } else {
            additionalValue = String(additionalValue); 
          }
          text += ` - ${additionalValue}`;
        }
        option.textContent = text;
        selectElement.appendChild(option);
      } else {
          // Log item yang bermasalah agar mudah di-debug dari respons API
          logWarn(`Item data tidak valid untuk dropdown ${selectElement.id}. Item dilewati:`, item, `Expected keys: '${valueKey}', '${textKey}'${additionalTextKey ? ", '" + additionalTextKey + "'" : ''}. Please check your API response structure for this item.`);
      }
    });
    logDebug(`Dropdown ${selectElement.id} telah diisi dengan ${selectElement.options.length - 1} opsi dari ${data.length} item. Total item disediakan: ${data.length}.`);
  }

  /**
   * Handles form submission for creating or updating a customer.
   */
  formPelanggan.addEventListener('submit', async (e) => {
    e.preventDefault();
    logInfo('Form disubmit. Mengambil data dari form...');

    const data = {
      nama_pelanggan: namaPelanggan.value,
      telp: telpUser.value,
      alamat: alamatPelanggan.value,
      rt: rt.value,
      rw: rw.value,
      kelurahan_id: kelurahanId.value,
      kecamatan: kecamatan.value,
      unit_id: unitId.value, // Mengirimkan ID yang dipilih dari dropdown
      harga_paket_id: hargaPaketId.value, // Mengirimkan ID yang dipilih dari dropdown
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
    logDebug('Data yang akan dikirim:', data);

    try {
      if (pelangganId.value) {
        logInfo('Melakukan update pelanggan dengan ID:', pelangganId.value);
        await updatePelanggan(pelangganId.value, data);
        alert('Data pelanggan berhasil diperbarui!');
        logSuccess('Pelanggan berhasil diperbarui.');
      } else {
        logInfo('Melakukan tambah pelanggan baru.');
        await createPelanggan(data);
        alert('Pelanggan berhasil ditambahkan!');
        logSuccess('Pelanggan berhasil ditambahkan.');
      }
      modalPelanggan.hide();
      formPelanggan.reset();
      // Refresh tabel setelah operasi CRUD
      fetchAndDisplayPelanggan(); 
    } catch (error) {
      logError('Gagal menyimpan pelanggan:', error);
      alert('Gagal menyimpan data pelanggan: ' + (error.message || 'Terjadi kesalahan tidak diketahui') + '. Periksa konsol (F12) untuk detail.');
    }
  });

  /**
   * Menangani event klik untuk tombol "Edit".
   * Mengambil data pelanggan tunggal dan mengisi form modal.
   * @param {string} id - ID pelanggan yang akan diedit.
   */
  async function handleEdit(id) {
    logInfo('Membuka modal edit untuk pelanggan ID:', id);
    try {
      const pelanggan = await getSinglePelanggan(id);
      logDebug('Data pelanggan untuk diedit diterima:', pelanggan);

      if (pelanggan) {
        modalLabel.textContent = 'Edit Pelanggan';
        pelangganId.value = pelanggan.id;
        namaPelanggan.value = pelanggan.nama_pelanggan || '';
        telpUser.value = pelanggan.telp || '';
        alamatPelanggan.value = pelanggan.alamat || '';
        rt.value = pelanggan.rt || '';
        rw.value = pelanggan.rw || '';
        kelurahanId.value = pelanggan.kelurahan_id || '';
        kecamatan.value = pelanggan.kecamatan || '';
        
        // PENTING: Pastikan array 'units' dan 'hargaPaket' sudah terisi
        // Ini memastikan dropdown memiliki opsi yang akan dipilih.
        // Jika belum terisi dari fetchAndDisplayPelanggan awal, coba ambil lagi.
        if (units.length === 0 || hargaPaket.length === 0) {
            logWarn('Data units atau hargaPaket kosong saat handleEdit. Mencoba memuat ulang dari API.');
            [units, hargaPaket] = await Promise.all([
                getUnits(),
                getHargaPaket()
            ]);
            logSuccess('Units dan Harga Paket berhasil dimuat ulang saat edit.');
        }

        // Isi ulang dropdown agar semua opsi tersedia sebelum mengatur nilai terpilih
        populateSelect(unitId, units, 'id', 'nama_unit');
        populateSelect(hargaPaketId, hargaPaket, 'id', 'alias_paket', 'total_amount');

        // Atur nilai yang dipilih di dropdown berdasarkan data pelanggan yang diedit
        // Prioritas: pelanggan.unit?.id (objek bersarang), lalu pelanggan.unit_id (ID langsung)
        unitId.value = pelanggan.unit?.id || pelanggan.unit_id || ''; 
        hargaPaketId.value = pelanggan.harga_paket?.id || pelanggan.harga_paket_id || ''; 

        logDebug(`Dropdown Unit diatur ke: ${unitId.value} (Data Pelanggan: Unit ID=${pelanggan.unit_id}, Unit Object ID=${pelanggan.unit?.id})`);
        logDebug(`Dropdown Harga Paket diatur ke: ${hargaPaketId.value} (Data Pelanggan: Paket ID=${pelanggan.harga_paket_id}, Paket Object ID=${pelanggan.harga_paket?.id})`);

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
      } else {
        logWarn('Pelanggan dengan ID tersebut tidak ditemukan:', id);
        alert('Data pelanggan tidak ditemukan.');
      }
    } catch (error) {
      logError('Gagal memuat data pelanggan untuk diedit:', error);
      alert('Gagal memuat data pelanggan untuk diedit: ' + (error.message || 'Terjadi kesalahan tidak diketahui') + '. Periksa konsol (F12) untuk detail.');
    }
  }

  /**
   * Menangani event klik untuk tombol "Hapus".
   * Meminta konfirmasi lalu menghapus pelanggan.
   * @param {string} id - ID pelanggan yang akan dihapus.
   */
  async function handleDelete(id) {
    if (confirm('Apakah Anda yakin ingin menghapus pelanggan ini?')) {
      logInfo('Melakukan penghapusan pelanggan dengan ID:', id);
      try {
        await deletePelanggan(id);
        alert('Pelanggan berhasil dihapus!');
        logSuccess('Pelanggan berhasil dihapus.');
        // Refresh tabel setelah penghapusan
        fetchAndDisplayPelanggan(); 
      } catch (error) {
        logError('Gagal menghapus pelanggan:', error);
        alert('Gagal menghapus pelanggan: ' + (error.message || 'Terjadi kesalahan tidak diketahui') + '. Periksa konsol (F12) untuk detail.');
      }
    }
  }

  /**
   * Melampirkan event listener ke tombol "Edit" dan "Hapus" di tabel.
   * Ini perlu dipanggil setiap kali tabel dirender ulang.
   */
  function addEventListenersToButtons() {
    logDebug('Menambahkan event listener ke tombol Edit/Hapus.');
    document.querySelectorAll('.btn-edit').forEach(button => {
      button.onclick = (e) => {
        e.preventDefault();
        handleEdit(button.dataset.id);
      };
    });
    document.querySelectorAll('.btn-delete').forEach(button => {
      button.onclick = (e) => {
        e.preventDefault();
        handleDelete(button.dataset.id);
      };
    });
  }

  // --- Event Listener untuk Aksi UI ---

  btnTambah.addEventListener('click', () => {
    logInfo('Tombol "Tambah Pelanggan" diklik. Mereset form.');
    modalLabel.textContent = 'Tambah Pelanggan';
    formPelanggan.reset();
    pelangganId.value = '';
    
    // Pastikan dropdown diisi ulang setiap kali modal "Tambah" dibuka
    // Data `units` dan `hargaPaket` seharusnya sudah ada dari `fetchAndDisplayPelanggan` awal
    populateSelect(unitId, units, 'id', 'nama_unit');
    populateSelect(hargaPaketId, hargaPaket, 'id', 'alias_paket', 'total_amount');
  });

  // Event listener untuk saat DOM selesai dimuat
  document.addEventListener('DOMContentLoaded', () => {
    logInfo('DOM Content Loaded. Memulai pengambilan dan tampilan data pelanggan awal.');
    fetchAndDisplayPelanggan();
  });
</script>

<?php
$content = ob_get_clean();
$title = "Data Pelanggan";
include 'layouts/template.php';
?>