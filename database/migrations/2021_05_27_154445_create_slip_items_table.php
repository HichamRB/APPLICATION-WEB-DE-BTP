<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlipItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slip_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference_item');
            $table->string('description');
            $table->string('unit');
            $table->float('unit_price');
            $table->float('qte_min');
            $table->float('qte_max');
            $table->float('total_price_min');
            $table->float('total_price_max');
            $table->unsignedBigInteger('slip_id');
            $table->foreign('slip_id')->references('id')->on('slips')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slip_items');
    }
}
