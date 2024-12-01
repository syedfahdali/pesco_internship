<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    public function up()
    {
        Schema::create('connections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('survey_id')->constrained('surveys')->onDelete('cascade');
            $table->string('type');
            $table->integer('quantity');
            $table->float('load_kva');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('connections');
    }
}
