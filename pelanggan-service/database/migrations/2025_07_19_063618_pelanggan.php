<?php

// database/migrations/2025_07_19_000000_create_old_customer_tbl_pelanggan_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('pelanggan', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelanggan', 100);
            $table->string('nama_pelanggan', 100);
            $table->string('password_pelanggan', 100)->nullable();
            $table->string('alamat_pelanggan', 200)->nullable();
            $table->string('rt', 100)->nullable();
            $table->string('rw', 100)->nullable();
            $table->string('kelurahan_id', 150)->nullable();
            $table->string('kecamatan', 150)->nullable();
            $table->string('telp_user', 100)->nullable();
            $table->string('id_telegram', 100)->nullable();
            $table->string('status_log', 255)->nullable();
            $table->timestamp('update_at')->nullable();
            $table->timestamp('create_at')->nullable();
            $table->string('va_bri', 150)->nullable();
            $table->string('va_bca', 150)->nullable();

            // foreign keys (unit_id dan harga_paket_id)
            $table->string('unit_id', 255);
            $table->foreign('unit_id')->references('unit_id')->on('units')->onDelete('set null');

            $table->integer('harga_paket_id')->unsigned()->nullable();
            $table->foreign('harga_paket_id')->references('log_key')->on('ref_harga_paket')->onDelete('set null');

            $table->string('status_followup', 100)->nullable();
            $table->string('stts_send_survei', 255)->nullable();
            $table->timestamp('log_aktivasi')->nullable();
            $table->string('no_combo', 100)->nullable();
            $table->string('log_username_dcp', 200)->nullable();
            $table->string('pendaftaran_id', 100)->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('old_customer_tbl_pelanggan');
    }
};
