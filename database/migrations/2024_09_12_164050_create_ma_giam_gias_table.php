<?php

use App\Models\Sach;
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
        Schema::create('ma_giam_gias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(TheLoai::class)->constrained();
            $table->foreignIdFor(Sach::class)->constrained();
            $table->string('ten_ma');
            $table->text('mo_ta');
            $table->unsignedBigInteger('giam_gia');
            $table->integer('so_luong');
            $table->date('ngay_bat_dau');
            $table->date('ngay_ket_thuc');
            $table->enum('loai_giam_gia', ['Phần trăm', 'Giá Giảm']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ma_giam_gias');
    }
};
