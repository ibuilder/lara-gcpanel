<?php
// filepath: database/migrations/xxxx_xx_xx_xxxxxx_create_locations_table.php
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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Building A", "Floor 1", "Room 101"
            $table->string('code')->nullable()->unique(); // Optional short code
            $table->text('description')->nullable();
            // Optional: Add parent_id for hierarchical locations (self-referencing)
            // $table->foreignId('parent_id')->nullable()->constrained('locations')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};