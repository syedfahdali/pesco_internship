<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('circle');
            $table->string('division');
            $table->string('sub_division');
            $table->date('completion_date');
            $table->string('work_order');
            $table->string('head');
            $table->string('sanctioned_by');
            $table->string('letter_no');
            $table->date('survey_date');
            $table->timestamps();
        });

        Schema::create('poles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
            $table->string('type');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('poles');
        Schema::dropIfExists('surveys');
    }
};
