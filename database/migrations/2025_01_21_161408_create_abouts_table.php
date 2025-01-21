<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('image');
            $table->text('about_me');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
