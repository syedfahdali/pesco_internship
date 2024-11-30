<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('circle');
            $table->string('division');
            $table->string('sub_division');
            $table->string('grid');
            $table->string('feeder');
            $table->string('distribution_system');
            $table->string('entry_type');
            $table->date('completion_date');
            $table->string('work_order');
            $table->string('head');
            $table->string('sanctioned_by');
            $table->string('letter_no');
            $table->date('survey_date');
            $table->timestamps();
        });

        Schema::create('ht_lines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->string('conductor_name');
            $table->float('length_in_kms');
            $table->timestamps();
        });

        Schema::create('transformers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->string('capacity');
            $table->integer('quantity');
            $table->string('coordinates');
            $table->string('category');
            $table->timestamps();
        });

        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->integer('quantity');
            $table->float('load_kva');
            $table->timestamps();
        });

        Schema::create('poles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained()->onDelete('cascade');
            $table->string('type');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('poles');
        Schema::dropIfExists('connections');
        Schema::dropIfExists('transformers');
        Schema::dropIfExists('ht_lines');
        Schema::dropIfExists('surveys');
    }
};
