<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('gender')->nullable();
            $table->string('postcode')->nullable();
            $table->string('city')->nullable();
            $table->string('banksort')->nullable();
            $table->string('banknumber')->nullable();
            $table->string('finder')->nullable();
            $table->string('api_private')->nullable();
            $table->string('api_public')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('file')->nullable();
            $table->string('tel')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
            $table->integer('admin')->default('0');
            $table->enum('active', ['0', '1'])->default('1');
            $table->string('token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
