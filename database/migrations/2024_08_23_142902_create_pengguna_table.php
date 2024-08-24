<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'pengguna'])->default('pengguna');
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_domisili')->nullable();
            $table->unsignedBigInteger('id_provinsi')->nullable();
            $table->unsignedBigInteger('id_kotkab')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('nohp')->nullable();
            $table->string('notelp')->nullable();
            $table->string('kewarnegaraan')->nullable();
            $table->string('kewarnegaraan_negara')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->unsignedBigInteger('id_provinsi_lahir')->nullable();
            $table->unsignedBigInteger('id_kotkab_lahir')->nullable();
            $table->string('negara')->nullable();
            $table->string('jk')->nullable();
            $table->string('menikah')->nullable();
            $table->unsignedBigInteger('id_agama')->nullable();
            $table->string('file_img')->nullable();
            $table->string('file_video')->nullable();
            $table->string('status_user')->nullable();
            $table->string('uid')->unique()->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengguna');
    }
}
