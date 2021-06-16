<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('products_id')->constrained();
            $table->string('sku')->nullable();
            $table->string('image_attr')->nullable();
            $table->integer('mrp')->nullable();
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->foreignId('sizes_id')->constrained();
            $table->foreignId('colors_id')->constrained();
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
        Schema::dropIfExists('product_attributes');
    }
}
