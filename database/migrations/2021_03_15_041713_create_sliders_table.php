<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('slider_name')->nullable();
            $table->string('image');
            $table->tinyInteger('upper')->default('1');
            $table->tinyInteger('middle')->default('2');
            $table->tinyInteger('lower')->default('3');
            $table->string('highlight')->nullable();
            $table->string('short_text')->nullable();
            $table->string('shopnow_url')->nullable();
            $table->string('explore_url')->nullable();

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
        Schema::dropIfExists('sliders');
    }
}
