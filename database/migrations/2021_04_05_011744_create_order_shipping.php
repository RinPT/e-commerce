<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_shipping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->enum('user_type',['individual', 'institutional']);
            $table->string('company');
            $table->string('tax_no');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->string('post_code');
            $table->string('telephone');
            $table->enum('method',['by hand','by kiss']);
            $table->enum('status',['preparing','transaction','delivered']);
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
        Schema::dropIfExists('order_shipping');
    }
}
