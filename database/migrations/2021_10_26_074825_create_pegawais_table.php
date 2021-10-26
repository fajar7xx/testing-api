<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16);
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin')->comment('pria/wanita');
            $table->date('tgl_lahir');
            $table->text('alamat_lengkap')->nullable();
            $table->foreignId('departemen_id')->constrained('departemen');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}
