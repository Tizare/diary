<?php

declare(strict_types=1);

use App\Enums\Theme;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('title', 190)->nullable();
            $table->string('description')->nullable();
            $table->text('text');
            $table->string('health')->nullable();
            $table->string('mood')->nullable();
            $table->tinyInteger('kg')->nullable();
            $table->smallInteger('gr')->nullable();
            $table->smallInteger('ht')->unsigned()->nullable();
            $table->tinyInteger('year')->nullable();
            $table->tinyInteger('month')->nullable();
            $table->enum('theme', Theme::all())->default('beige');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
