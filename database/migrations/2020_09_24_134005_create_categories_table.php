<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
              $table->id();
            $table->string('slug')->nullable();
            $table->string('name');
            $table->string('nameEn')->nullable();
            $table->string('descriptionEn')->nullable();
            $table->string('description')->nullable();
            $table->string('file')->nullable();
            $table->string('tagLink')->nullable();
            $table->string('icon')->nullable();
            $table->integer('status')->default(1);
            $table->integer('menu_id')->nullable();
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('categories');
    }
}
