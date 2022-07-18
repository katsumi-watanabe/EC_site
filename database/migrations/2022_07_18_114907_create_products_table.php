<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('genre_id')->nullable();
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->nullable();
            $table->text('image_1')->nullable();
            $table->text('image_2')->nullable();
            $table->text('image_3')->nullable();
            $table->text('image_4')->nullable();
            $table->boolean('sales_status')->default(false);
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
};
