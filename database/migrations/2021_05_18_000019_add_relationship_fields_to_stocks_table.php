<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStocksTable extends Migration
{
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id', 'product_fk_3936004')->references('id')->on('products');
            $table->unsignedBigInteger('supplier_id')->nullable();
            $table->foreign('supplier_id', 'supplier_fk_3936008')->references('id')->on('contact_companies');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_3936068')->references('id')->on('projects');
            $table->unsignedBigInteger('site_id')->nullable();
            $table->foreign('site_id', 'site_fk_3936069')->references('id')->on('sites');
            $table->unsignedBigInteger('validate_by_id')->nullable();
            $table->foreign('validate_by_id', 'validate_by_fk_3936071')->references('id')->on('users');
        });
    }
}
