<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->string('id', 30)->primary();
            $table->string('name',200);
            $table->string('form',100);
            $table->string('marketingStatus',100);
            $table->date('approvalDate');
            $table->Integer('quantity');
            $table->decimal('price', 10, 2);
            $table->Boolean('inStock')->default(true);
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
        Schema::dropIfExists('stock');
    }
}
