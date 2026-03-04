<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_id')->nullable()->change();
        });

        Schema::table('m_barang', function (Blueprint $table) {
            try {
                $table->dropForeign('m_barang_supplier_id_foreign');
            } catch (\Throwable $e) {
            }
        });

        Schema::table('m_barang', function (Blueprint $table) {
            $table->foreign('supplier_id', 'm_barang_supplier_id_foreign')
                ->references('supplier_id')->on('m_supplier')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('m_barang', function (Blueprint $table) {
            try {
                $table->dropForeign('m_barang_supplier_id_foreign');
            } catch (\Throwable $e) {
            }
        });
    }
};
