<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPerProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_per_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('product_id')->unsigned();
            $table->foreignId('category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('product_id')->references('id')->on('products'); 
            $table->foreign('category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_per_products');
    }
}
