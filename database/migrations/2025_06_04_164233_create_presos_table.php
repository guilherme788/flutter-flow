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
      Schema::create('presos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('documento_identidade');
        $table->date('data_nascimento');
        $table->string('crime');
        $table->date('data_condenacao');
        $table->string('status');
        $table->foreignId('cela_id')->constrained('celas')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presos');
    }
};
