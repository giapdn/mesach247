<?php

use App\Models\TheLoai;
use App\Models\User;
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
        Schema::create('saches', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TheLoai::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->string('ten_sach');
            $table->string('anh_bia_sach')->nullable();
            $table->unsignedBigInteger('gia_goc');
            $table->text('tom_tat')->nullable();
            $table->date('ngay_dang');
            $table->integer('so_luong_da_ban');
            $table->enum('kiem_duyet', ['Chờ xác nhận', 'Từ chối', 'Duyệt']);
            $table->unsignedBigInteger('gia_khuyen_mai');
            $table->enum('trang_thai', ['Ẩn', 'Hiện']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saches');
    }
};
