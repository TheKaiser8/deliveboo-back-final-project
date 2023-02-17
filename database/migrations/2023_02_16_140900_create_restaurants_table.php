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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('address');
            $table->string('vat_number', 11);
            $table->string('image')->nullable();
            // $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        // Schema::table('restaurants', function (Blueprint $table) {
        //     $table->dropForeign(['user_id']);
        // });
        Schema::dropIfExists('restaurants');
    }
};
