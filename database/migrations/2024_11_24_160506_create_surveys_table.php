<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('circle');
            $table->string('division');
            $table->string('sub_division')->nullable();
            $table->string('grid')->default('Default Grid');
            $table->string('feeder')->default('Default Feeder');
            $table->string('distribution_system')->default('Unknown');
            $table->string('entry_type')->nullable();
            $table->date('completion_date');
            $table->string('work_order');
            $table->string('head')->nullable();
            $table->string('sanctioned_by')->nullable();
            $table->string('letter_no')->nullable();
            $table->date('survey_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('surveys');
    }
}
