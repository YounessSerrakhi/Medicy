<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine', function (Blueprint $table) {
            $table->string('idMedicine', 30)->primary();
            $table->string('name', 200);
            $table->string('form', 100);
            $table->string('marketingStatus', 45);
            $table->date('approvalDate');
            $table->decimal('price', 10, 4)->nullable();
            $table->timestamps();
            $table->bigint('barcode')->primary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicine');
    }
}
