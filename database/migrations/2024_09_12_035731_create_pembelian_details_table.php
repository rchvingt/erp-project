<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel 'pembelian_details'
        Schema::create('pembelian_details', function (Blueprint $table) {
            $table->id('id_po_detail'); // primary key, auto increment
            $table->unsignedBigInteger('id_po'); // foreign key to 'purchase_order' table
            $table->unsignedBigInteger('id_material'); // foreign key to 'ref_material' table
            $table->integer('qty'); // quantity of material
            $table->float('harga'); // price per unit
            $table->float('total'); // total price
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();

            // Foreign key constraints (without cascade)
            $table->index('id_po'); // create index for id_po
            $table->foreign('id_po')->references('id_po')->on('pembelian');

            $table->index('id_material'); // create index for id_material
            $table->foreign('id_material')->references('id_material')->on('ref_material');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembelian_details', function (Blueprint $table) {
            // Menghapus foreign key constraints sebelum menghapus tabel
            $table->dropForeign(['id_po']);
            $table->dropForeign(['id_material']);
        });
        Schema::dropIfExists('pembelian_details');
    }
};
