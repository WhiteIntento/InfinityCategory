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
        Schema::create('category_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger("category_id")->references("id")->on("categories");
            $table->unsignedInteger("language_id")->references("id")->on("languages");
            $table->string("name");
            $table->text("description")->nullable();
            $table->string("keywords")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_languages');
    }
};
