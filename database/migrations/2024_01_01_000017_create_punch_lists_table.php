php
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
        Schema::create('punch_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->string('description');
            $table->string('location');
            $table->string('status')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punch_lists');
    }
};