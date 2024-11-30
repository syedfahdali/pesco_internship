<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('connections', function (Blueprint $table) {
        $table->id();
        $table->foreignId('survey_id')->constrained()->onDelete('cascade');
        $table->string('type_of_connection');
        $table->integer('quantity');
        $table->float('load_kva');
        $table->timestamps();
    });
}

    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connections');
    }
}
