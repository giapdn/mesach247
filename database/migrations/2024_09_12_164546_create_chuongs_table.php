<?php

use App\Models\Sach;
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
        Schema::create('chuongs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sach::class)->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->string('so_chuong');
            $table->date('ngay_len_song');
            $table->enum('noi_dung_nguoi_lon', ['co', 'khong']);
            $table->enum('trang_thai',['an','hien']);
            $table->enum('kiem_duyet', ['cho_xac_nhan', 'tu_choi', 'duyet','ban_nhap']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuongs');
    }
};
