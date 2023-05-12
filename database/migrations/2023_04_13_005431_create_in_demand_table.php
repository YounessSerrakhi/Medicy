<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInDemandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inDemand', function (Blueprint $table) {
            $table->Increments('idDemand');
            $table->unsignedInteger('idMedicine');
            $table->unsignedInteger('idProvider');
            $table->integer('quantity');
            $table->string('livreurName');
            $table->string('livreurTel');
            $table->timestamps();

            // Define the primary key constraint
            $table->primary('idDemand');

            // Define foreign key constraints
            $table->foreign('idMedicine')->references('idMedicine')->on('medicine');
            $table->foreign('idProvider')->references('idProvider')->on('provider');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('in_demand');
    }
}
