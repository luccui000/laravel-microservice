<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkuProductVariantOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sku_product_variant_options', function (Blueprint $table) {
            $table->unsignedBigInteger('product_variant_id')->nullable();
            $table->foreign('product_variant_id')->references('id')->on('product_variants')->onDelete('cascade');
            $table->unsignedBigInteger('sku_id')->nullable();
            $table->foreign('sku_id')->references('id')->on('skus')->onDelete('cascade');
            $table->unsignedBigInteger('product_variant_option_id')->nullable();
            $table->foreign('product_variant_option_id')->references('id')->on('product_variant_options')->onDelete('cascade');
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
        Schema::dropIfExists('sku_product_variant_options');
    }
}
