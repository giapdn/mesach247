<?php

use App\Models\ChuyenMuc;
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
        Schema::create('bai_viets', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(ChuyenMuc::class)->nullable()
                ->constrained()
                ->onDelete('set null');;
            $table->string('hinh_anh')->nullable();
            $table->string('tieu_de');
            $table->text('noi_dung');
            $table->date('ngay_dang');
            $table->enum('trang_thai',['an','hien']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bai_viets');
    }
};
