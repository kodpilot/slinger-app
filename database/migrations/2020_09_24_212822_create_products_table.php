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
            $table->string('file')->nullable()->default('empty.png');
            $table->string('name')->nullable();
            $table->string('nameEn')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->text('text')->nullable();
            $table->text('textEn')->nullable();
            $table->string('tags')->nullable();
            $table->string('tagsEn')->nullable();
            // Begin::Enum Preferences
            $table->enum('status',['0','1'])->default('1');
             // End::Enum Preferences
            $table->integer('order')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
