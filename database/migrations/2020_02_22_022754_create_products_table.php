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
            $table->string('title')->nullable();
            $table->string('photo')->default('products/default.jpg');
            $table->longtext('content')->nullable();

            $table->integer('stock')->nullable();
            $table->double('price',8,2)->nullable();
            $table->double('price_offer',8,2)->nullable();

            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable(); 

            $table->date('start_offer_at')->nullable();
            $table->date('end_offer_at')->nullable();


            $table->unsignedBigInteger("category_id")->nullable();
            $table->foreign("category_id")->references('id')->on('categories')->onDelete('cascade');

            $table->string('weight')->nullable();

            $table->unsignedBigInteger("weight_id")->nullable();
            $table->foreign("weight_id")->references('id')->on('weights')->onDelete('cascade');

            $table->unsignedBigInteger("manufactury_id")->nullable();
            $table->foreign("manufactury_id")->references('id')->on('manufacturers')->onDelete('cascade');            

            $table->unsignedBigInteger("trade_id")->nullable();
            $table->foreign("trade_id")->references('id')->on('trademarks')->onDelete('cascade'); 

            $table->string("size")->nullable();
            $table->unsignedBigInteger("size_id")->nullable();
            $table->foreign("size_id")->references('id')->on('sizes')->onDelete('cascade');  

            $table->unsignedBigInteger("color_id")->nullable();
            $table->foreign("color_id")->references('id')->on('colors')->onDelete('cascade');         

            $table->unsignedBigInteger("currency_id")->nullable();
            $table->foreign("currency_id")->references('id')->on('countries')->onDelete('cascade');            

            $table->enum('status',['pending','refused','active'])->default('pending');

            $table->longtext('reason')->nullable();
            $table->longtext('other_data')->nullable();
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('products');
    }

    
}
