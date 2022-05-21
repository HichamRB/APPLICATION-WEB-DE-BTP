<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSitesTable extends Migration
{
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->unsignedBigInteger('site_manager_id')->nullable();
            $table->foreign('site_manager_id', 'site_manager_fk_3935972')->references('id')->on('employes');
        });
    }
}
