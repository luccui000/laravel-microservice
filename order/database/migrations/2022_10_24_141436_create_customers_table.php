<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('phone', 20);
            $table->string('address_1', 200)->nullable();
            $table->string('address_2', 300)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('billing_address', 100)->nullable();
            $table->string('billing_region', 100)->nullable();
            $table->string('billing_postalcode', 10)->nullable();
            $table->string('billing_country', 100)->nullable();
            $table->string('ship_address', 100)->nullable();
            $table->string('ship_region', 100)->nullable();
            $table->string('ship_postalcode', 10)->nullable();
            $table->string('ship_country', 100)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
