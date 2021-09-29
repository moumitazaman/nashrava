<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('image');
            $table->string('title');
            $table->string('slug')->unique();           
            $table->double('price');
            $table->double('discount')->nullable();
            $table->integer('qty');
            $table->LongText('details');
            $table->tinyInteger('status')->default('1'); 
            $table->tinyInteger('best_status')->default('0'); 
            $table->tinyInteger('offers')->default('0'); 
            $table->boolean('new_arrival')->default('0');
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
        Schema::dropIfExists('products');
    }
}
