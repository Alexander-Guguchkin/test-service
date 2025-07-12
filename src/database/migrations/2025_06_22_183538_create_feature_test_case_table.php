<?php

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
        Schema::create('feature_test_case', function (Blueprint $table) {
            $table->unsignedBigInteger('test_case_id');
            $table->unsignedBigInteger('feature_id');
            $table->timestamps(); // опционально, если нужны метки времени

            $table->foreign('test_case_id')->references('id')->on('test_cases')->onDelete('cascade');
            $table->foreign('feature_id')->references('id')->on('features')->onDelete('cascade');

            $table->primary(['test_case_id', 'feature_id']); // составной первичный ключ
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feature_test_case');
    }
};
