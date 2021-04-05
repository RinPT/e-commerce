<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
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
            $table->bigInteger('store_id');
            $table->string('store_name');
            $table->text('store_url');
            $table->bigInteger('user_id');
            $table->enum('user_type', ['individual', 'institutional']);
            $table->string('name');
            $table->string('surname');
            $table->string('username');
            $table->string('email');
            $table->enum('gender',['male','female','other']);
            $table->text('comment')->nullable();
            $table->decimal('total',50);
            $table->enum('order_status',['waiting','approved','cancelled']);
            $table->string('currency_code');
            $table->string('ip_address',40);
            $table->text('user_agent');
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
