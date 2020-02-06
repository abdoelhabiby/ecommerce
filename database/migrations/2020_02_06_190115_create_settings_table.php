<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name_ar");
            $table->string("name_en");
            $table->string("main_lang")->default("ar");
            $table->string("email")->nullable();
            $table->string("logo")->nullable();
            $table->string("icon")->nullable();
            $table->longtext("description")->nullable();
            $table->longtext("keywords")->nullable();
            $table->longtext("maintenance_message")->nullable();
            $table->enum("status",['open','close'])->default('open');
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
        Schema::dropIfExists('settings');
    }
}
