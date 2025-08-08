// frontend/api.js/units

const API_BASE_URL = 'http://localhost:8001/api/units';

// GET
export async function getUnits(page = 1, perPage = 10) {
  const response = await fetch(`${API_BASE_URL}?page=${page}&per_page=${perPage}`);
  if (!response.ok) throw new Error('Gagal mengambil data unit');
  const result = await response.json();
  return {
    data: result.data || [],
    meta: result.meta || {
      current_page: 1,
      last_page: 1,
      total: 0,
      per_page: perPage,
      from: 1,
      to: 1,
    }
  };
}

export async function getAllUnits() {
  const response = await fetch(`${API_BASE_URL}/all`);
  if (!response.ok) throw new Error('Gagal mengambil semua unit');
  const result = await response.json();
  return { data: result.data || [] };
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

export async function getHargaPaket(page = 1, perPage = 10) {
  try {
    const response = await fetch(`${API_PAKET_BASE_URL}?page=${page}&per_page=${perPage}`);
    if (!response.ok) {
      const errorDetail = await response.text();
      console.error('API Error: Gagal mengambil data harga paket. Status:', response.status, 'Detail:', errorDetail);
      throw new Error('Gagal mengambil data harga paket dari server.');
    }

    const result = await response.json();
    console.log('API Success: Data harga paket berhasil diambil.', result);

    // Ambil langsung dari result
    return {
      data: result.data || [],
      current_page: result.current_page || 1,
      last_page: result.last_page || 1,
      total: result.total || 0,
    };
  } catch (error) {
    console.error('Kesalahan jaringan atau server:', error);
    return {
      data: [],
      current_page: 1,
      last_page: 1,
      total: 0,
    };
  }
}

export async function getAllHargaPaket() {
  const response = await fetch(`${API_PAKET_BASE_URL}/all`);
  if (!response.ok) throw new Error('Gagal mengambil semua harga paket');
  const result = await response.json();
  return { data: result.data || [] };
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
export async function getPelanggan(page = 1, perPage = 10) {
  const response = await fetch(`${API_PELANGGAN_BASE_URL}?page=${page}&per_page=${perPage}`);
  if (!response.ok) throw new Error('Gagal mengambil data pelanggan');
  const result = await response.json();

  return {
    data: result.data ?? [],
    current_page: result.current_page ?? 1,
    last_page: result.last_page ?? 1,
    total: result.total ?? 0,
  };
}

// GET single
export async function getSinglePelanggan(id) {
  const response = await fetch(`${API_PELANGGAN_BASE_URL}/${id}`);
  if (!response.ok) throw new Error('Data tidak ditemukan');
  const result = await response.json();
  return result.data;
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