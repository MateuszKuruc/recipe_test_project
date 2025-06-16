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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('excerpt')->nullable();
            $table->longText('instructions')->nullable();
            $table->longText('description')->nullable();
            $table->string('notes')->nullable();
            $table->unsignedSmallInteger('prepare_time')->nullable()->comment('Measured by minutes');
            $table->unsignedSmallInteger('cooking_time')->nullable()->comment('Measured by minutes');
            $table->string('servings')->nullable();
            $table->string('youtube_url')->nullable();
            //region Flags
            $table->boolean('is_low_carb')->default(false);
            $table->boolean('is_high_protein')->default(false);
            $table->boolean('is_spicy')->default(false);
            $table->boolean('is_vegetarian')->default(false);
            $table->boolean('is_vegan')->default(false);
            $table->boolean('is_pescatarian')->default(false);
            //endregion
            $table->unsignedBigInteger('view_count')->default(1);
            $table->timestamp('featured_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
