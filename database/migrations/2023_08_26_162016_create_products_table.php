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
            $table->bigInteger('cat_id');
            $table->string('name');
            $table->mediumText('small_description')->nullable();
            $table->longText('description');
            $table->string('original_price');
            $table->string('selling_price');
            $table->string('image')->nullable();
            $table->string('qty');
            $table->string('tax');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('trending');
            $table->mediumText('meta_title');
            $table->mediumText('meta_keyword');
            $table->mediumText('meta_description');
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
