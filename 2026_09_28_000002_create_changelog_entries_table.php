<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('changelog_entries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('release_id')
                ->constrained('releases')
                ->cascadeOnDelete();

            $table->enum('type', [
                'added',
                'changed',
                'fixed',
                'removed',
                'security',
            ]);

            $table->string('title');
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('changelog_entries');
    }
};
