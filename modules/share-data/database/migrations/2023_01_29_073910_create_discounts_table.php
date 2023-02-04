<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('customer_category_id');
            $table->string('type', 50);
            $table->double('value');
            $table->tinyInteger('status');
            $table->dateTime('active_date');
            $table->foreign('customer_category_id')->references('id')->on('customer_categories')->onDelete('cascade'); 
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
        Schema::dropIfExists('discounts');
    }
}
