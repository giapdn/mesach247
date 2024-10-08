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
        Schema::create('chuyen_mucs', function (Blueprint $table) {
            $table->id();
            $table->string('ten_chuyen_muc');
            $table->unsignedBigInteger('chuyen_muc_cha_id')->nullable();
            $table->enum('trang_thai', ['an', 'hien']);
            $table->timestamps();

            $table->foreign('chuyen_muc_cha_id')
                ->references('id')
                ->on('chuyen_mucs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyen_mucs');
    }
};
