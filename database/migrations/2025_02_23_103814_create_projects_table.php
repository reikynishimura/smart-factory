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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_code');
            $table->unsignedBigInteger('status_id');
            $table->string('material');
            $table->text('project_description')->nullable()->default(null);
            $table->date('start_date');
            $table->date('finish_date');
            $table->string('qty');
            $table->timestamps();

            $table->foreign('status_id')->references('id')->on('statuses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
