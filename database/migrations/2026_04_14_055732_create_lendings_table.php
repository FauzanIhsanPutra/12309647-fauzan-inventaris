<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lendings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->foreignId('item_id')
                ->constrained('items')
                ->onDelete('cascade');
            $table->integer('total');
            $table->string('keterangan');
            $table->string('status')->default('Dipinjam');
            $table->string('edited_by')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lendings');
    }
};
