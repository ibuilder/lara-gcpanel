<?php
// filepath: database/migrations/xxxx_xx_xx_xxxxxx_create_project_infos_table.php
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
        Schema::create('project_infos', function (Blueprint $table) {
            $table->id(); // Only one row expected, but ID is standard
            $table->string('project_name')->nullable();
            $table->string('project_number')->nullable();
            $table->text('project_address')->nullable();
            $table->string('client_name')->nullable();
            $table->string('project_manager_name')->nullable(); // Or link to a User ID
            // Add other relevant project fields as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_infos');
    }
};