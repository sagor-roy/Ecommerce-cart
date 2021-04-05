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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->text('desc');
            $table->string('code');
            $table->unsignedBigInteger('stock');
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discount');
            $table->enum('status',['active','inactive']);
            $table->string('f_img');
            $table->string('s_img');
            $table->string('t_img');
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
