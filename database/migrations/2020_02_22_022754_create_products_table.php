<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('photo');
            $table->string('content');

            $table->integer('stock')->nullable();
            $table->decimal('price',5,2)->nullable();
            $table->decimal('price_offer',5,2)->nullable();

            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable(); 

            $table->date('start_offer_at')->nullable();
            $table->date('end_offer_at')->nullable();


            $table->unsignedBigInteger("category_id");
            $table->foreign("category_id")->references('id')->on('categories')->onDelete('cascade');

            $table->string('weight');

            $table->unsignedBigInteger("weight_id");
            $table->foreign("weight_id")->references('id')->on('weights')->onDelete('cascade');

            $table->unsignedBigInteger("manufactury_id");
            $table->foreign("manufactury_id")->references('id')->on('manufacturers')->onDelete('cascade');            

            $table->unsignedBigInteger("trade_id");
            $table->foreign("trade_id")->references('id')->on('trademarks')->onDelete('cascade'); 

            $table->unsignedBigInteger("size_id");
            $table->foreign("size_id")->references('id')->on('sizes')->onDelete('cascade');  

            $table->unsignedBigInteger("color_id");
            $table->foreign("color_id")->references('id')->on('colors')->onDelete('cascade');         

            $table->unsignedBigInteger("currency_id");
            $table->foreign("currency_id")->references('id')->on('countries')->onDelete('cascade');            

            $table->longtext('other_data')->nullable();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('products');
    }

    
}
