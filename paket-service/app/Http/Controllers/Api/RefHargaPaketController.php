<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RefHargaPaket;
use Illuminate\Http\Request;

class RefHargaPaketController extends Controller
{
    public function index()
    {
        return RefHargaPaket::all();
    }

    public function show($id)
    {
        return RefHargaPaket::findOrFail($id);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alias_paket' => 'required|string|max:150',
            'paket' => 'required|string|max:10',
            'ref_gol' => 'required|string|max:10',
            'dpp' => 'nullable|numeric',
            'ppn' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
            'margin' => 'nullable|numeric',
            'status' => 'nullable|string',
            'create_log' => 'nullable|date',
            'jenis_paket' => 'nullable|string|max:100',
        ]);

        // Jangan kirim log_key karena itu auto increment
        return RefHargaPaket::create($validated);
    }

    public function update(Request $request, $id)
    {
        $paket = RefHargaPaket::findOrFail($id);

        $validated = $request->validate([
            'alias_paket' => 'sometimes|required|string|max:150',
            'paket' => 'sometimes|required|string|max:10',
            'ref_gol' => 'sometimes|required|string|max:10',
            'dpp' => 'nullable|numeric',
            'ppn' => 'nullable|numeric',
            'total_amount' => 'nullable|numeric',
            'margin' => 'nullable|numeric',
            'status' => 'nullable|string',
            'create_log' => 'nullable|date',
            'jenis_paket' => 'nullable|string|max:100',
        ]);

        $paket->update($validated);
        return $paket;
    }

    public function destroy($id)
    {
        return RefHargaPaket::destroy($id);
    }
}
