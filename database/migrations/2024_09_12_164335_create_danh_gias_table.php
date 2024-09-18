<?php

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
        Schema::create('danh_gias', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sach::class)
            ->constrained()
            ->onDelete('cascade');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->text('noi_dung');
            $table->date('ngay_danh_gia');
            $table->enum('muc_do_hai_long',['rat_hay','hay','trung_binh','te','rat_te']);
            $table->enum('trang_thai',['an','hien']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('danh_gias');
    }
};
