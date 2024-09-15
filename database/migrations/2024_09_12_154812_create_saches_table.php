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
            $table->text('mo_ta_ngan')->nullable();
            $table->text('mo_ta_chi_tiet')->nullable();
            $table->date('ngay_dang');
            $table->integer('so_luong_da_ban');
            $table->enum('trang_thai', ['Chờ xác nhận', 'Từ chối', 'Duyệt']);
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
