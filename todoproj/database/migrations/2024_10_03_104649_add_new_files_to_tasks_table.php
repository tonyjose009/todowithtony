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
        Schema::table('tasks', function (Blueprint $table) {
            //
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->foreignId('project_id')->constrained();
            $table->integer('priority');
            $table->tinyInteger('status')->default('1'); //0=closed, 1=opened
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            //
            $table->dropColumn('name', 'description', 'project_id', 'priority', 'status');
            $table->dropForeign('project_id');
        });
    }
};
