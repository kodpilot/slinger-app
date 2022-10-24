<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname')->nullable();
            $table->string('addressName')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('country')->nullable();
            $table->string('tc')->nullable()->default(11111111111);
            $table->string('mail')->nullable();
            $table->string('tel')->nullable();
            $table->integer('user_id')->nullable()->uniqid();
            $table->string('session_id')->nullable();
            $table->enum('status',['0','1'])->default('1');
            $table->enum('billing',['0','1'])->default(0);
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
        Schema::dropIfExists('addresses');
    }
}
