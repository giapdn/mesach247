<?php

use App\Models\MaGiamGia;
use App\Models\PhuongThucThanhToan;
use App\Models\Sach;
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
        Schema::create('thanh_toans', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sach::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(PhuongThucThanhToan::class)->constrained();
            $table->foreignIdFor(MaGiamGia::class)->constrained();
            $table->bigInteger('gia_cuoi_cung');
            $table->bigInteger('tong_gia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanh_toans');
    }
};
