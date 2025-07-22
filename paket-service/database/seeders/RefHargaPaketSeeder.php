<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RefHargaPaketSeeder extends Seeder
{
    public function run(): void
    {
        
        DB::table('ref_harga_paket')->insert([
            'log_key' => 1,
            'alias_paket' => 'INTERNET PRO 15MB',
            'paket' => 'PRO10',
            'ref_gol' => 'A',
            'dpp' => 164248.04,
            'ppn' => 18067.28,
            'total_amount' => 182315.32,
            'margin' => 38981.57,
            'status' => 'nonaktif',
            'create_log' => '2020-04-08 17:44:47',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 2,
            'alias_paket' => 'PAKET PRO 43MB',
            'paket' => 'PRO30',
            'ref_gol' => 'A',
            'dpp' => 209779.32,
            'ppn' => 23075.73,
            'total_amount' => 232855.05000000002,
            'margin' => 40453.39,
            'status' => 'aktif',
            'create_log' => '2022-09-20 08:34:45',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 3,
            'alias_paket' => 'PAKET PRO 99MB',
            'paket' => 'PRO20',
            'ref_gol' => 'C',
            'dpp' => 281491.33,
            'ppn' => 30964.05,
            'total_amount' => 312455.38,
            'margin' => 17476.24,
            'status' => 'aktif',
            'create_log' => '2021-10-25 23:18:31',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 4,
            'alias_paket' => 'PAKET PRO 24MB',
            'paket' => 'PRO20',
            'ref_gol' => 'A',
            'dpp' => 235918.97,
            'ppn' => 25951.09,
            'total_amount' => 261870.06,
            'margin' => 16372.78,
            'status' => 'aktif',
            'create_log' => '2024-07-11 20:15:45',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 5,
            'alias_paket' => 'INTERNET KAPTEN 85MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'B',
            'dpp' => 152114.2,
            'ppn' => 16732.56,
            'total_amount' => 168846.76,
            'margin' => 46934.58,
            'status' => 'nonaktif',
            'create_log' => '2020-04-18 23:37:36',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 6,
            'alias_paket' => 'PAKETAN BIZ 24MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 88478.67,
            'ppn' => 9732.65,
            'total_amount' => 98211.31999999999,
            'margin' => 14815.5,
            'status' => 'nonaktif',
            'create_log' => '2021-09-12 19:46:55',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 7,
            'alias_paket' => 'INTERNET PRO 35MB',
            'paket' => 'PRO30',
            'ref_gol' => 'A',
            'dpp' => 215480.21,
            'ppn' => 23702.82,
            'total_amount' => 239183.03,
            'margin' => 31105.83,
            'status' => 'nonaktif',
            'create_log' => '2022-08-10 22:33:17',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 8,
            'alias_paket' => 'INTERNET KAPTEN 19MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'B',
            'dpp' => 220763.4,
            'ppn' => 24283.97,
            'total_amount' => 245047.37,
            'margin' => 38098.04,
            'status' => 'aktif',
            'create_log' => '2021-09-21 07:06:32',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 9,
            'alias_paket' => 'PAKET BIZ 10MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 153998.57,
            'ppn' => 16939.84,
            'total_amount' => 170938.41,
            'margin' => 29636.38,
            'status' => 'nonaktif',
            'create_log' => '2023-09-10 19:21:20',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 10,
            'alias_paket' => 'PAKETAN KAPTEN 40MB',
            'paket' => 'PRO30',
            'ref_gol' => 'A',
            'dpp' => 156538.8,
            'ppn' => 17219.27,
            'total_amount' => 173758.06999999998,
            'margin' => 26152.64,
            'status' => 'nonaktif',
            'create_log' => '2020-07-16 09:35:57',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 11,
            'alias_paket' => 'PAKET KAPTEN 33MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'A',
            'dpp' => 239262.27,
            'ppn' => 26318.85,
            'total_amount' => 265581.12,
            'margin' => 49004.89,
            'status' => 'aktif',
            'create_log' => '2020-09-12 09:21:02',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 12,
            'alias_paket' => 'INTERNET PRO 42MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'B',
            'dpp' => 282062.68,
            'ppn' => 31026.89,
            'total_amount' => 313089.57,
            'margin' => 21363.39,
            'status' => 'aktif',
            'create_log' => '2024-02-15 12:07:21',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 13,
            'alias_paket' => 'PAKET PRO 23MB',
            'paket' => 'PRO30',
            'ref_gol' => 'B',
            'dpp' => 110003.01,
            'ppn' => 12100.33,
            'total_amount' => 122103.34,
            'margin' => 11843.57,
            'status' => 'nonaktif',
            'create_log' => '2023-05-25 01:17:37',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 14,
            'alias_paket' => 'PAKET PRO 44MB',
            'paket' => 'PRO30',
            'ref_gol' => 'C',
            'dpp' => 121295.47,
            'ppn' => 13342.5,
            'total_amount' => 134637.97,
            'margin' => 41200.71,
            'status' => 'nonaktif',
            'create_log' => '2024-01-17 03:40:31',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 15,
            'alias_paket' => 'PAKETAN PRO 71MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'A',
            'dpp' => 178203.46,
            'ppn' => 19602.38,
            'total_amount' => 197805.84,
            'margin' => 35843.65,
            'status' => 'aktif',
            'create_log' => '2021-01-12 23:19:47',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 16,
            'alias_paket' => 'INTERNET PRO 68MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 285598.36,
            'ppn' => 31415.82,
            'total_amount' => 317014.18,
            'margin' => 26976.19,
            'status' => 'nonaktif',
            'create_log' => '2021-11-01 10:55:34',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 17,
            'alias_paket' => 'PAKETAN KAPTEN 29MB',
            'paket' => 'PRO30',
            'ref_gol' => 'A',
            'dpp' => 56306.45,
            'ppn' => 6193.71,
            'total_amount' => 62500.159999999996,
            'margin' => 30123.8,
            'status' => 'aktif',
            'create_log' => '2023-06-04 19:42:31',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 18,
            'alias_paket' => 'PAKET PRO 68MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'B',
            'dpp' => 133758.32,
            'ppn' => 14713.42,
            'total_amount' => 148471.74000000002,
            'margin' => 28591.08,
            'status' => 'aktif',
            'create_log' => '2025-03-06 10:10:51',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 19,
            'alias_paket' => 'PAKETAN KAPTEN 29MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'A',
            'dpp' => 288206.1,
            'ppn' => 31702.67,
            'total_amount' => 319908.76999999996,
            'margin' => 11360.52,
            'status' => 'nonaktif',
            'create_log' => '2025-06-25 17:24:19',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 20,
            'alias_paket' => 'PAKET PRO 66MB',
            'paket' => 'PRO30',
            'ref_gol' => 'B',
            'dpp' => 81133.12,
            'ppn' => 8924.64,
            'total_amount' => 90057.76,
            'margin' => 16543.33,
            'status' => 'aktif',
            'create_log' => '2022-06-03 04:29:07',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 21,
            'alias_paket' => 'PAKETAN BIZ 47MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'C',
            'dpp' => 67847.47,
            'ppn' => 7463.22,
            'total_amount' => 75310.69,
            'margin' => 11958.01,
            'status' => 'nonaktif',
            'create_log' => '2022-12-01 00:31:55',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 22,
            'alias_paket' => 'INTERNET BIZ 25MB',
            'paket' => 'PRO30',
            'ref_gol' => 'C',
            'dpp' => 216386.78,
            'ppn' => 23802.55,
            'total_amount' => 240189.33,
            'margin' => 48090.2,
            'status' => 'nonaktif',
            'create_log' => '2021-06-10 14:15:36',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 23,
            'alias_paket' => 'INTERNET BIZ 23MB',
            'paket' => 'PRO30',
            'ref_gol' => 'B',
            'dpp' => 243009.72,
            'ppn' => 26731.07,
            'total_amount' => 269740.79,
            'margin' => 19943.63,
            'status' => 'aktif',
            'create_log' => '2023-12-10 13:41:38',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 24,
            'alias_paket' => 'PAKETAN BIZ 67MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'C',
            'dpp' => 73742.05,
            'ppn' => 8111.63,
            'total_amount' => 81853.68000000001,
            'margin' => 35399.64,
            'status' => 'aktif',
            'create_log' => '2022-11-02 14:44:34',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 25,
            'alias_paket' => 'INTERNET KAPTEN 63MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'A',
            'dpp' => 210237.29,
            'ppn' => 23126.1,
            'total_amount' => 233363.39,
            'margin' => 42917.53,
            'status' => 'aktif',
            'create_log' => '2024-08-05 16:17:32',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 26,
            'alias_paket' => 'PAKET BIZ 67MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'B',
            'dpp' => 92631.82,
            'ppn' => 10189.5,
            'total_amount' => 102821.32,
            'margin' => 36237.7,
            'status' => 'nonaktif',
            'create_log' => '2022-09-08 02:23:37',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 27,
            'alias_paket' => 'INTERNET BIZ 26MB',
            'paket' => 'PRO30',
            'ref_gol' => 'C',
            'dpp' => 168442.28,
            'ppn' => 18528.65,
            'total_amount' => 186970.93,
            'margin' => 46243.45,
            'status' => 'aktif',
            'create_log' => '2022-01-01 00:55:15',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 28,
            'alias_paket' => 'PAKET PRO 45MB',
            'paket' => 'PRO30',
            'ref_gol' => 'A',
            'dpp' => 134374.51,
            'ppn' => 14781.2,
            'total_amount' => 149155.71000000002,
            'margin' => 24997.17,
            'status' => 'nonaktif',
            'create_log' => '2020-12-23 23:16:38',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 29,
            'alias_paket' => 'PAKETAN BIZ 23MB',
            'paket' => 'PRO20',
            'ref_gol' => 'B',
            'dpp' => 94213.72,
            'ppn' => 10363.51,
            'total_amount' => 104577.23,
            'margin' => 31212.97,
            'status' => 'nonaktif',
            'create_log' => '2025-04-18 13:29:28',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 30,
            'alias_paket' => 'INTERNET BIZ 69MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'A',
            'dpp' => 235472.17,
            'ppn' => 25901.94,
            'total_amount' => 261374.11000000002,
            'margin' => 19104.84,
            'status' => 'nonaktif',
            'create_log' => '2020-12-11 15:14:55',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 31,
            'alias_paket' => 'PAKET PRO 17MB',
            'paket' => 'PRO20',
            'ref_gol' => 'A',
            'dpp' => 213679.66,
            'ppn' => 23504.76,
            'total_amount' => 237184.42,
            'margin' => 48717.8,
            'status' => 'nonaktif',
            'create_log' => '2022-09-06 07:33:26',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 32,
            'alias_paket' => 'INTERNET BIZ 25MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'C',
            'dpp' => 118610.86,
            'ppn' => 13047.19,
            'total_amount' => 131658.05,
            'margin' => 25021.06,
            'status' => 'aktif',
            'create_log' => '2022-06-09 17:14:52',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 33,
            'alias_paket' => 'PAKETAN PRO 29MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 222985.67,
            'ppn' => 24528.42,
            'total_amount' => 247514.09000000003,
            'margin' => 31850.96,
            'status' => 'nonaktif',
            'create_log' => '2022-02-26 21:10:52',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 34,
            'alias_paket' => 'PAKET BIZ 91MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'C',
            'dpp' => 139560.93,
            'ppn' => 15351.7,
            'total_amount' => 154912.63,
            'margin' => 32329.82,
            'status' => 'aktif',
            'create_log' => '2020-05-21 07:03:06',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 35,
            'alias_paket' => 'PAKET KAPTEN 36MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 91832.43,
            'ppn' => 10101.57,
            'total_amount' => 101934.0,
            'margin' => 14022.75,
            'status' => 'aktif',
            'create_log' => '2025-07-16 02:46:06',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 36,
            'alias_paket' => 'INTERNET KAPTEN 91MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'A',
            'dpp' => 128617.39,
            'ppn' => 14147.91,
            'total_amount' => 142765.3,
            'margin' => 28014.04,
            'status' => 'aktif',
            'create_log' => '2024-11-05 12:57:47',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 37,
            'alias_paket' => 'PAKETAN BIZ 37MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'C',
            'dpp' => 271247.73,
            'ppn' => 29837.25,
            'total_amount' => 301084.98,
            'margin' => 13098.7,
            'status' => 'nonaktif',
            'create_log' => '2020-01-12 21:41:18',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 38,
            'alias_paket' => 'PAKETAN PRO 95MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'A',
            'dpp' => 207461.28,
            'ppn' => 22820.74,
            'total_amount' => 230282.02,
            'margin' => 25068.58,
            'status' => 'aktif',
            'create_log' => '2020-12-13 02:05:05',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 39,
            'alias_paket' => 'INTERNET PRO 90MB',
            'paket' => 'PRO20',
            'ref_gol' => 'A',
            'dpp' => 118855.67,
            'ppn' => 13074.12,
            'total_amount' => 131929.79,
            'margin' => 18099.62,
            'status' => 'nonaktif',
            'create_log' => '2020-02-17 13:44:35',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 40,
            'alias_paket' => 'PAKET BIZ 69MB',
            'paket' => 'PRO10',
            'ref_gol' => 'B',
            'dpp' => 137057.67,
            'ppn' => 15076.34,
            'total_amount' => 152134.01,
            'margin' => 43672.13,
            'status' => 'nonaktif',
            'create_log' => '2020-12-13 21:22:10',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 41,
            'alias_paket' => 'INTERNET PRO 45MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'A',
            'dpp' => 166966.2,
            'ppn' => 18366.28,
            'total_amount' => 185332.48,
            'margin' => 27788.42,
            'status' => 'aktif',
            'create_log' => '2021-02-07 03:41:26',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 42,
            'alias_paket' => 'PAKETAN BIZ 89MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'B',
            'dpp' => 164834.48,
            'ppn' => 18131.79,
            'total_amount' => 182966.27000000002,
            'margin' => 23013.73,
            'status' => 'aktif',
            'create_log' => '2021-09-27 04:49:17',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 43,
            'alias_paket' => 'PAKETAN BIZ 33MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'B',
            'dpp' => 66500.77,
            'ppn' => 7315.08,
            'total_amount' => 73815.85,
            'margin' => 24461.91,
            'status' => 'nonaktif',
            'create_log' => '2022-10-30 22:40:49',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 44,
            'alias_paket' => 'PAKETAN PRO 86MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'A',
            'dpp' => 161791.47,
            'ppn' => 17797.06,
            'total_amount' => 179588.53,
            'margin' => 27737.23,
            'status' => 'nonaktif',
            'create_log' => '2022-03-27 07:56:36',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 45,
            'alias_paket' => 'PAKETAN KAPTEN 40MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'C',
            'dpp' => 175051.49,
            'ppn' => 19255.66,
            'total_amount' => 194307.15,
            'margin' => 32706.41,
            'status' => 'aktif',
            'create_log' => '2024-08-22 22:59:50',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 46,
            'alias_paket' => 'PAKETAN BIZ 52MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'C',
            'dpp' => 257155.97,
            'ppn' => 28287.16,
            'total_amount' => 285443.13,
            'margin' => 10983.32,
            'status' => 'aktif',
            'create_log' => '2023-10-05 08:18:52',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 47,
            'alias_paket' => 'PAKETAN PRO 30MB',
            'paket' => 'PRO10',
            'ref_gol' => 'B',
            'dpp' => 123431.4,
            'ppn' => 13577.45,
            'total_amount' => 137008.85,
            'margin' => 39717.56,
            'status' => 'nonaktif',
            'create_log' => '2022-05-04 00:39:52',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 48,
            'alias_paket' => 'PAKETAN PRO 54MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'B',
            'dpp' => 286826.81,
            'ppn' => 31550.95,
            'total_amount' => 318377.76,
            'margin' => 33197.27,
            'status' => 'aktif',
            'create_log' => '2024-02-22 20:36:17',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 49,
            'alias_paket' => 'PAKETAN BIZ 75MB',
            'paket' => 'PRO10',
            'ref_gol' => 'C',
            'dpp' => 121887.86,
            'ppn' => 13407.66,
            'total_amount' => 135295.52,
            'margin' => 35046.78,
            'status' => 'nonaktif',
            'create_log' => '2020-07-23 21:33:51',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 50,
            'alias_paket' => 'PAKET PRO 62MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'B',
            'dpp' => 101459.57,
            'ppn' => 11160.55,
            'total_amount' => 112620.12000000001,
            'margin' => 42541.45,
            'status' => 'nonaktif',
            'create_log' => '2025-01-13 05:36:54',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 51,
            'alias_paket' => 'PAKET BIZ 27MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'C',
            'dpp' => 226602.01,
            'ppn' => 24926.22,
            'total_amount' => 251528.23,
            'margin' => 33753.07,
            'status' => 'aktif',
            'create_log' => '2023-06-06 12:05:59',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 52,
            'alias_paket' => 'PAKETAN BIZ 24MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'B',
            'dpp' => 241738.61,
            'ppn' => 26591.25,
            'total_amount' => 268329.86,
            'margin' => 35124.51,
            'status' => 'aktif',
            'create_log' => '2020-03-16 10:29:24',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 53,
            'alias_paket' => 'PAKETAN BIZ 68MB',
            'paket' => 'PRO10',
            'ref_gol' => 'C',
            'dpp' => 186465.47,
            'ppn' => 20511.2,
            'total_amount' => 206976.67,
            'margin' => 39872.95,
            'status' => 'nonaktif',
            'create_log' => '2022-01-17 22:51:07',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 54,
            'alias_paket' => 'INTERNET PRO 59MB',
            'paket' => 'PRO20',
            'ref_gol' => 'A',
            'dpp' => 104163.19,
            'ppn' => 11457.95,
            'total_amount' => 115621.14,
            'margin' => 10156.54,
            'status' => 'aktif',
            'create_log' => '2021-01-26 08:56:47',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 55,
            'alias_paket' => 'INTERNET KAPTEN 24MB',
            'paket' => 'PRO10',
            'ref_gol' => 'B',
            'dpp' => 219178.21,
            'ppn' => 24109.6,
            'total_amount' => 243287.81,
            'margin' => 14456.17,
            'status' => 'nonaktif',
            'create_log' => '2021-06-28 15:47:43',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 56,
            'alias_paket' => 'PAKET KAPTEN 64MB',
            'paket' => 'PRO10',
            'ref_gol' => 'A',
            'dpp' => 124928.86,
            'ppn' => 13742.17,
            'total_amount' => 138671.03,
            'margin' => 14524.02,
            'status' => 'nonaktif',
            'create_log' => '2023-06-02 04:41:38',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 57,
            'alias_paket' => 'PAKETAN PRO 72MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'A',
            'dpp' => 179037.61,
            'ppn' => 19694.14,
            'total_amount' => 198731.75,
            'margin' => 15193.97,
            'status' => 'aktif',
            'create_log' => '2023-10-08 04:48:33',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 58,
            'alias_paket' => 'PAKETAN KAPTEN 97MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 297141.31,
            'ppn' => 32685.54,
            'total_amount' => 329826.85,
            'margin' => 27424.95,
            'status' => 'aktif',
            'create_log' => '2021-08-26 01:36:25',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 59,
            'alias_paket' => 'INTERNET PRO 51MB',
            'paket' => 'PRO20',
            'ref_gol' => 'B',
            'dpp' => 196604.25,
            'ppn' => 21626.47,
            'total_amount' => 218230.72,
            'margin' => 44350.04,
            'status' => 'aktif',
            'create_log' => '2022-08-11 10:58:42',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 60,
            'alias_paket' => 'INTERNET BIZ 21MB',
            'paket' => 'PRO20',
            'ref_gol' => 'C',
            'dpp' => 126777.57,
            'ppn' => 13945.53,
            'total_amount' => 140723.1,
            'margin' => 19723.98,
            'status' => 'nonaktif',
            'create_log' => '2021-05-21 20:46:54',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 61,
            'alias_paket' => 'PAKETAN BIZ 12MB',
            'paket' => 'PRO20',
            'ref_gol' => 'A',
            'dpp' => 109233.54,
            'ppn' => 12015.69,
            'total_amount' => 121249.23,
            'margin' => 35022.21,
            'status' => 'nonaktif',
            'create_log' => '2024-05-22 01:44:35',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 62,
            'alias_paket' => 'INTERNET BIZ 91MB',
            'paket' => 'PRO30',
            'ref_gol' => 'B',
            'dpp' => 209719.65,
            'ppn' => 23069.16,
            'total_amount' => 232788.81,
            'margin' => 46394.56,
            'status' => 'nonaktif',
            'create_log' => '2021-10-23 17:02:35',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 63,
            'alias_paket' => 'INTERNET BIZ 94MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'A',
            'dpp' => 120186.99,
            'ppn' => 13220.57,
            'total_amount' => 133407.56,
            'margin' => 20252.55,
            'status' => 'nonaktif',
            'create_log' => '2020-01-13 01:17:15',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 64,
            'alias_paket' => 'PAKETAN PRO 77MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'B',
            'dpp' => 203912.78,
            'ppn' => 22430.41,
            'total_amount' => 226343.19,
            'margin' => 42525.28,
            'status' => 'aktif',
            'create_log' => '2020-06-17 02:22:05',
            'jenis_paket' => 'KAPTEN',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 65,
            'alias_paket' => 'PAKETAN PRO 99MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'C',
            'dpp' => 79131.09,
            'ppn' => 8704.42,
            'total_amount' => 87835.51,
            'margin' => 39773.06,
            'status' => 'nonaktif',
            'create_log' => '2021-07-14 18:41:46',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 66,
            'alias_paket' => 'PAKETAN KAPTEN 57MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'A',
            'dpp' => 78408.99,
            'ppn' => 8624.99,
            'total_amount' => 87033.98000000001,
            'margin' => 13955.69,
            'status' => 'nonaktif',
            'create_log' => '2022-06-15 15:50:08',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 67,
            'alias_paket' => 'PAKET BIZ 64MB',
            'paket' => 'PRO30',
            'ref_gol' => 'B',
            'dpp' => 239350.07,
            'ppn' => 26328.51,
            'total_amount' => 265678.58,
            'margin' => 26810.6,
            'status' => 'nonaktif',
            'create_log' => '2023-04-26 10:27:24',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 68,
            'alias_paket' => 'INTERNET BIZ 94MB',
            'paket' => 'PRO30',
            'ref_gol' => 'C',
            'dpp' => 226678.64,
            'ppn' => 24934.65,
            'total_amount' => 251613.29,
            'margin' => 32900.93,
            'status' => 'nonaktif',
            'create_log' => '2022-12-03 02:53:54',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 69,
            'alias_paket' => 'PAKETAN BIZ 42MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'C',
            'dpp' => 143908.71,
            'ppn' => 15829.96,
            'total_amount' => 159738.66999999998,
            'margin' => 42780.98,
            'status' => 'nonaktif',
            'create_log' => '2023-10-22 08:43:52',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 70,
            'alias_paket' => 'PAKETAN PRO 54MB',
            'paket' => 'PRO20',
            'ref_gol' => 'A',
            'dpp' => 96368.99,
            'ppn' => 10600.59,
            'total_amount' => 106969.58,
            'margin' => 32139.59,
            'status' => 'aktif',
            'create_log' => '2025-03-06 05:52:08',
            'jenis_paket' => 'BIZNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 71,
            'alias_paket' => 'PAKET PRO 26MB',
            'paket' => 'PRO20',
            'ref_gol' => 'B',
            'dpp' => 218955.95,
            'ppn' => 24085.15,
            'total_amount' => 243041.1,
            'margin' => 39216.74,
            'status' => 'nonaktif',
            'create_log' => '2021-10-24 03:49:44',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 72,
            'alias_paket' => 'INTERNET KAPTEN 78MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'B',
            'dpp' => 183907.16,
            'ppn' => 20229.79,
            'total_amount' => 204136.95,
            'margin' => 38285.15,
            'status' => 'nonaktif',
            'create_log' => '2024-03-24 16:02:51',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 73,
            'alias_paket' => 'INTERNET PRO 36MB',
            'paket' => 'PRO10',
            'ref_gol' => 'C',
            'dpp' => 294639.67,
            'ppn' => 32410.36,
            'total_amount' => 327050.02999999997,
            'margin' => 46033.6,
            'status' => 'nonaktif',
            'create_log' => '2025-02-20 02:29:31',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 74,
            'alias_paket' => 'INTERNET PRO 92MB',
            'paket' => 'BIZ10',
            'ref_gol' => 'B',
            'dpp' => 243529.93,
            'ppn' => 26788.29,
            'total_amount' => 270318.22,
            'margin' => 22836.08,
            'status' => 'aktif',
            'create_log' => '2024-08-28 05:48:05',
            'jenis_paket' => 'PAKET DATA',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 75,
            'alias_paket' => 'PAKET KAPTEN 73MB',
            'paket' => 'PRO30',
            'ref_gol' => 'C',
            'dpp' => 80060.26,
            'ppn' => 8806.63,
            'total_amount' => 88866.89,
            'margin' => 46058.36,
            'status' => 'aktif',
            'create_log' => '2024-05-12 02:55:41',
            'jenis_paket' => 'PRO',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 76,
            'alias_paket' => 'PAKETAN PRO 28MB',
            'paket' => 'BIZ30',
            'ref_gol' => 'A',
            'dpp' => 94289.68,
            'ppn' => 10371.86,
            'total_amount' => 104661.54,
            'margin' => 13975.35,
            'status' => 'aktif',
            'create_log' => '2023-02-24 03:35:18',
            'jenis_paket' => 'INTERNET',
        ]);
    

        DB::table('ref_harga_paket')->insert([
            'log_key' => 77,
            'alias_paket' => 'INTERNET BIZ 78MB',
            'paket' => 'BIZ20',
            'ref_gol' => 'B',
            'dpp' => 139581.15,
            'ppn' => 15353.93,
            'total_amount' => 154935.08,
            'margin' => 10150.08,
            'status' => 'aktif',
            'create_log' => '2020-05-25 16:54:36',
            'jenis_paket' => 'BIZNET',
        ]);
    
    }
}
