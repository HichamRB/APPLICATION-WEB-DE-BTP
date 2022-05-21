<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAfectationsTable extends Migration
{

    public function up()
    {
        Schema::create('afectations', function (Blueprint $table) {
            $table->id();
            $table->integer('employe_id');
            $table->integer('chantier_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('afectations');
    }
}
