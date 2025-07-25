// frontend/api.js/units

const API_BASE_URL = 'http://localhost:8001/api/units';

// GET
export async function getUnits() {
  const response = await fetch(API_BASE_URL);
  const result = await response.json();
  return result.data || result;
}

// DELETE
export async function deleteUnit(id) {
  const response = await fetch(`${API_BASE_URL}/${id}`, { method: 'DELETE' });
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

// GET all
export async function getHargaPaket() {
  const response = await fetch(API_PAKET_BASE_URL);
  const result = await response.json();
  return result.data || result;
}

// GET single
export async function getSingleHargaPaket(id) {
  const response = await fetch(`${API_PAKET_BASE_URL}/${id}`);
  if (!response.ok) throw new Error('Data tidak ditemukan');
  const result = await response.json();
  return result.data || result;
}

// POST create
export async function createHargaPaket(data) {
  const response = await fetch(API_PAKET_BASE_URL, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  if (!response.ok) throw new Error('Gagal menambah harga paket');
  return await response.json();
}

// PUT update
export async function updateHargaPaket(id, data) {
  const response = await fetch(`${API_PAKET_BASE_URL}/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(data),
  });
  if (!response.ok) throw new Error('Gagal mengubah harga paket');
  return await response.json();
}

// DELETE
export async function deleteHargaPaket(id) {
  const response = await fetch(`${API_PAKET_BASE_URL}/${id}`, {
    method: 'DELETE',
  });
  const result = await response.json();
  return result.message;
}

// frontend/api.js/pelanggan

const API_PELANGGAN_BASE_URL = 'http://localhost:8003/api/pelanggan';

// GET all
export async function getPelanggan() {
  const response = await fetch(API_PELANGGAN_BASE_URL);
  const result = await response.json();
  return result.data || result;
}

// GET single
export async function getSinglePelanggan(id) {
  const response = await fetch(`${API_PELANGGAN_BASE_URL}/${id}`);
  if (!response.ok) throw new Error('Data tidak ditemukan');
  const result = await response.json();
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
  const result = await response.json();
  return result.message;
}