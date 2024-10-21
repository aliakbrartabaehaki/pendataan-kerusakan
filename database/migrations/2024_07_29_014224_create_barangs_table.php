<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
        public function up()
        {
            Schema::create('barangs', function (Blueprint $table) {
                $table->bigIncrements('barang_id');
                $table->string('nama_barang');
                $table->text('deskripsi');
                $table->integer('kategori_id');
                $table->string('nama');
                $table->enum('lokasi', [
                    'Gedung Ir.Juanda - datin', 
                    'Gedung Ir.Juanda - strahan', 
                    'Gedung Ir.Juanda - sumdahan', 
                    'Gedung Ir.Juanda - alpahan', 
                    'Gedung Ir.Juanda - ruang_rpt_L5', 
                    'Gedung Prof,IrSoepomo,Mr,Sh - TU', 
                    'Gedung Prof,IrSoepomo,Mr,Sh - Kabadan', 
                    'Gedung Prof,IrSoepomo,Mr,Sh - Proglab'
                ]);
                $table->date('tanggal_kerusakan');
                $table->enum('status', ['rusak'])->nullable();
                $table->timestamps();
            });
        }

    public function down()
    {
        Schema::dropIfExists('barangs');
    }
}
