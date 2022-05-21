<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedBigInteger('client_id')->nullable();
            $table->foreign('client_id', 'client_fk_3935954')->references('id')->on('contact_companies');
            $table->unsignedBigInteger('project_chef_id')->nullable();
            $table->foreign('project_chef_id', 'project_chef_fk_3935956')->references('id')->on('employes');
        });
    }
}
