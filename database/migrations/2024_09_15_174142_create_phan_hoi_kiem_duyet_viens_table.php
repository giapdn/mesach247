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
        Schema::create('phan_hoi_kiem_duyet_viens', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Sach::class)->constrained();
            $table->foreignIdFor(User::class)->constrained();
            $table->string('chu_de');
            $table->text('noi_dung')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phan_hoi_kiem_duyet_viens');
    }
};
