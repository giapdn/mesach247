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
        Schema::create('don_hangs', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sach::class)
                ->nullable()
                ->constrained()
                ->onDelete('set null');
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(PhuongThucThanhToan::class)->constrained();
            $table->string('ma_don_hang')->unique();
            $table->bigInteger('so_tien_thanh_toan');
            $table->enum('trang_thai', ['thanh_cong', 'dang_xu_ly', 'that_bai']);
            $table->text('mo_ta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('don_hangs');
    }
};
