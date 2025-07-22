<?php

// app/Http/Controllers/RefHargaPaketController.php

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
        $request->validate([
            'alias_paket' => 'required|string|max:150',
            'paket' => 'required|string|max:10',
            'ref_gol' => 'required|string|max:10',
        ]);

        return RefHargaPaket::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $paket = RefHargaPaket::findOrFail($id);
        $paket->update($request->all());
        return $paket;
    }

    public function destroy($id)
    {
        return RefHargaPaket::destroy($id);
    }
}
