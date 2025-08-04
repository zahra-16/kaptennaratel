// frontend/api.js/units

const API_BASE_URL = 'http://localhost:8001/api/units';

// GET
export async function getUnits() {
  const response = await fetch(API_BASE_URL);
  if (!response.ok) throw new Error('Gagal mengambil data unit');
  const result = await response.json();
  return result.data || result;
}

// DELETE
export async function deleteUnit(id) {
  const response = await fetch(`${API_BASE_URL}/${id}`, {
    method: 'DELETE',
  });
  if (!response.ok) throw new Error('Gagal menghapus unit');
  const result = await response.json();
  return result.message;
}

// CREATE
export async function createUnit(data) {
  const response = await fetch(API_BASE_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  if (!response.ok) throw new Error('Gagal menambah unit');
  return await response.json();
}

// UPDATE
export async function updateUnit(id, data) {
  const response = await fetch(`${API_BASE_URL}/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  if (!response.ok) throw new Error('Gagal mengubah unit');
  return await response.json();
}


// frontend/api.js/paket

const API_PAKET_BASE_URL = 'http://localhost:8002/api/harga-paket';

export async function getHargaPaket() {
  try {
    const response = await fetch(API_PAKET_BASE_URL);
    if (!response.ok) {
      const errorDetail = await response.text();
      console.error('API Error: Gagal mengambil data harga paket. Status:', response.status, 'Detail:', errorDetail);
      throw new Error('Gagal mengambil data harga paket dari server.');
    }
    const result = await response.json();
    console.log('API Success: Data harga paket berhasil diambil.', result);
    
    if (result && Array.isArray(result.data)) {
        return result.data;
    } else if (Array.isArray(result)) {
        return result;
    } else {
        console.warn('API Warning: Respons harga paket bukan array yang diharapkan. Mengembalikan array kosong.');
        return [];
    }
  } catch (error) {
    console.error('Kesalahan jaringan atau server:', error);
    throw new Error('Terjadi kesalahan saat berkomunikasi dengan server harga paket.');
  }
}

export async function getSingleHargaPaket(id) {
  try {
    const response = await fetch(`${API_PAKET_BASE_URL}/${id}`);
    if (!response.ok) {
      const errorDetail = await response.text();
      console.error('API Error: Gagal mengambil detail paket. Status:', response.status, 'Detail:', errorDetail);
      throw new Error('Data paket tidak ditemukan.');
    }
    const result = await response.json();
    console.log('API Success: Detail harga paket berhasil diambil.', result);
    return result.data || result;
  } catch (error) {
    console.error('Kesalahan jaringan atau server:', error);
    throw new Error('Terjadi kesalahan saat mengambil detail paket.');
  }
}

export async function createHargaPaket(data) {
  try {
    const response = await fetch(API_PAKET_BASE_URL, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });
    if (!response.ok) {
      const errorDetail = await response.text();
      console.error('API Error: Gagal menambah harga paket. Status:', response.status, 'Detail:', errorDetail);
      throw new Error('Gagal menambah harga paket ke server.');
    }
    const result = await response.json();
    console.log('API Success: Harga paket berhasil ditambahkan.', result);
    return result;
  } catch (error) {
    console.error('Kesalahan jaringan atau server:', error);
    throw new Error('Terjadi kesalahan saat menambah harga paket.');
  }
}

export async function updateHargaPaket(id, data) {
  try {
    const response = await fetch(`${API_PAKET_BASE_URL}/${id}`, {
      method: 'PUT',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });
    if (!response.ok) {
      const errorDetail = await response.text();
      console.error('API Error: Gagal mengubah harga paket. Status:', response.status, 'Detail:', errorDetail);
      throw new Error('Gagal mengubah harga paket di server.');
    }
    const result = await response.json();
    console.log('API Success: Harga paket berhasil diubah.', result);
    return result;
  } catch (error) {
    console.error('Kesalahan jaringan atau server:', error);
    throw new Error('Terjadi kesalahan saat mengubah harga paket.');
  }
}

export async function deleteHargaPaket(id) {
  try {
    const response = await fetch(`${API_PAKET_BASE_URL}/${id}`, {
      method: 'DELETE',
    });
    if (!response.ok) {
      const errorDetail = await response.text();
      console.error('API Error: Gagal menghapus harga paket. Status:', response.status, 'Detail:', errorDetail);
      throw new Error('Gagal menghapus harga paket dari server.');
    }
    const result = await response.json();
    console.log('API Success: Harga paket berhasil dihapus.', result);
    return result.message;
  } catch (error) {
    console.error('Kesalahan jaringan atau server:', error);
    throw new Error('Terjadi kesalahan saat menghapus harga paket.');
  }
}


// frontend/api.js/pelanggan

const API_PELANGGAN_BASE_URL = 'http://localhost:8003/api/pelanggan';

// GET all
export async function getPelanggan() {
  const response = await fetch(API_PELANGGAN_BASE_URL);
  if (!response.ok) throw new Error('Gagal mengambil data pelanggan');
  const result = await response.json();
  // Ensure we return the data array if it's nested under 'data'
  return result.data || result;
}

// GET single
export async function getSinglePelanggan(id) {
  const response = await fetch(`${API_PELANGGAN_BASE_URL}/${id}`);
  if (!response.ok) throw new Error('Data tidak ditemukan');
  const result = await response.json();
  // Ensure we return the data object if it's nested under 'data'
  return result.data || result;
}

// POST create
export async function createPelanggan(data) {
  const response = await fetch(API_PELANGGAN_BASE_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  if (!response.ok) throw new Error('Gagal menambah pelanggan');
  return await response.json();
}

// PUT update
export async function updatePelanggan(id, data) {
  const response = await fetch(`${API_PELANGGAN_BASE_URL}/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  if (!response.ok) throw new Error('Gagal mengubah pelanggan');
  return await response.json();
}

// DELETE
export async function deletePelanggan(id) {
  const response = await fetch(`${API_PELANGGAN_BASE_URL}/${id}`, {
    method: 'DELETE',
  });
  if (!response.ok) throw new Error('Gagal menghapus pelanggan');
  const result = await response.json();
  return result.message;
}