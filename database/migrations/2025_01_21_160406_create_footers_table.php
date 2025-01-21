<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('footers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('facebook_Link');
            $table->string('whatsapp_Link');
            $table->string('instgram_Link');
            $table->string('linkedIn_Link');
            $table->string('youtube_Link');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
