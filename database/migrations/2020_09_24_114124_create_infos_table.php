<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infos', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('title')->nullable();
            $table->string('watermark')->nullable();
            $table->string('watermark_position')->nullable();
            $table->string('watermark_size')->nullable();
            $table->string('watermark_opacity')->nullable();
            $table->string('watermark_rotate')->nullable();
            $table->string('titleEn')->nullable();
            $table->text('description')->nullable();
            $table->text('descriptionEn')->nullable();
            $table->string('keywords')->nullable();
            $table->string('keywordsEn')->nullable();
            $table->string('favicon')->nullable();
            $table->text('aboutUs')->nullable();
            $table->text('aboutUsEn')->nullable();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('mail1')->nullable();
            $table->string('mail2')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('recaptcha_sitekey')->nullable();
            $table->string('recaptcha_secretKey')->nullable();
            $table->text('analytics')->nullable();
            $table->text('map')->nullable();
            $table->string('video')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('snapwidget')->nullable();
            $table->string('companyName')->nullable();
            $table->string('companyOfficial')->nullable();
            $table->string('companyAddress')->nullable();
            $table->string('companyPhone')->nullable();
            $table->string('taxAdministration')->nullable();
            $table->string('taxNo')->nullable();
            $table->string('theme')->default(0);
            $table->string('mobile_api_private')->nullable();
            $table->string('mobile_api_public')->nullable();
            $table->enum('status', ['0', '1'])->nullable();
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
        Schema::dropIfExists('infos');
    }
}
