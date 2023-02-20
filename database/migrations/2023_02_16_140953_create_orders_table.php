<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name_customer', 100);
            $table->string('address_customer', 150);
            $table->string('email_customer', 100)->unique();
            $table->string('phone_number', 30)->unique();
            $table->dateTime('delivery_date');
            $table->dateTime('creation_date');
            $table->decimal('total_price', 6,2);
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
};
