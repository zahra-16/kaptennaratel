<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefHargaPaket;
use Illuminate\Support\Carbon;

class RefHargaPaketSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();
        $paketList = [];

        for ($i = 1; $i <= 77; $i++) {
            $paketCode = 'PKT' . str_pad($i, 3, '0', STR_PAD_LEFT);
            $alias = 'Paket ' . chr(65 + ($i % 26));
            $refGol = 'G' . (($i % 5) + 1);
            $dpp = 100000 + ($i * 1000);
            $ppn = round($dpp * 0.11, 2);
            $total = $dpp + $ppn;
            $margin = rand(10000, 30000);
            $status = $i % 2 == 0 ? 'aktif' : 'nonaktif';
            $jenis = $i % 2 == 0 ? 'INTERNET' : 'RUMAHAN';

            $paketList[] = [
                'alias_paket' => $alias,
                'paket' => $paketCode,
                'ref_gol' => $refGol,
                'dpp' => $dpp,
                'ppn' => $ppn,
                'total_amount' => $total,
                'margin' => $margin,
                'status' => $status,
                'create_log' => $now,
                'jenis_paket' => $jenis,
            ];
        }

        RefHargaPaket::insert($paketList);
    }
}
