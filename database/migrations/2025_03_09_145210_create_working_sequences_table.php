<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('working_sequences', function (Blueprint $table) {
            $table->id();
            $table->string('working_sequence_code')->unique();
            $table->integer('person_required')->nullable();
            $table->enum('multi_wi', ['Ya', 'Tidak']);
            $table->string('process_code');
            $table->string('process_name');
            $table->string('work_center_name');
            $table->string('work_center_code');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('working_sequences');
    }
};

