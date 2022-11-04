<?php

use App\Models\Order;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 20)->nullable();
            $table->unsignedInteger('item_count')->default(1);
            $table->dateTime('ship_date')->nullable();
            $table->double('sub_total');
            $table->float('discount')->nullable();
            $table->double('total');
            $table->string('status')->default(Order::PENDING);

            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('shipper_id')->nullable();
            $table->foreign('shipper_id')->references('id')->on('shippers')->onDelete('cascade');
            $table->unsignedBigInteger('payment_type_id')->nullable();
            $table->foreign('payment_type_id')->references('id')->on('payment_types')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
