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
        Schema::create('kiem_duyet_cong_tac_viens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('email');
            $table->string('ten_doc_gia');
            $table->string('so_dien_thoai');
            $table->string('dia_chi');
            $table->date('sinh_nhat');
            $table->enum('gioi_tinh', ['Nam', 'Nữ']);
            $table->string('cmnd_mat_truoc');
            $table->string('cmnd_mat_sau');
            $table->enum('trang_thai', ['chua_ho_tro', 'duyet', 'tu_choi']);
            $table->string('ghi_chu')->nullable();
            $table->string('cv_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kiem_duyet_cong_tac_viens');
    }
};
