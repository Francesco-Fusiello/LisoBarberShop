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
        Schema::create('google_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('review_id')->unique();
            $table->string('author_name');
            $table->unsignedTinyInteger('rating');
            $table->text('text')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('relative_time');
            $table->boolean('from_google')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_reviews');
    }
};
