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
        Schema::create('google_review_stats', function (Blueprint $table) {
             $table->id();
            $table->integer('total_reviews')->default(0);
            $table->decimal('average_rating', 2, 1)->default(0); // media stelle con 1 decimale
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_review_stats');
    }
};
