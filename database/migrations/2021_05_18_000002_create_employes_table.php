<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployesTable extends Migration
{
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name');
            $table->string('mobile');
            $table->date('birthday')->nullable();
            $table->string('cin')->nullable();
            $table->string('address')->nullable();
            $table->string('rib');
            $table->string('bank')->nullable();
            $table->string('salary_type');
            $table->decimal('salary', 15, 2)->nullable();
            $table->date('job_start')->nullable();
            $table->date('job_end')->nullable();
            $table->string('contract_type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
