<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void
    {
        Schema::create('education', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('start_at');
            $table->date('end_at')->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('city')->default('Sohage');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
