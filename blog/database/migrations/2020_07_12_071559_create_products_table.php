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
            $table->string('title');
            $table->foreignId('category_id')->constrained('categories')->delete('cascade');
            $table->foreignId('user_id')->constrained('users')->delete('cascade');
            $table->text('description');
            $table->text('condition');
            $table->foreignId('location_id')->constrained('locations')->delete('cascade');
            $table->integer('price');
            $table->string('image');
            $table->boolean('visible')->default('0');
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
