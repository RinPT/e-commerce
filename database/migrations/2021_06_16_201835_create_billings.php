<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('invoice_no');
            $table->bigInteger('user_id');
            $table->dateTime('date_paid')->nullable();
            //Store info
            $table->bigInteger('store_id');
            $table->string('store_name');
            $table->string('store_tax_no');
            $table->string('store_country');
            $table->string('store_city');
            $table->text('store_address');
            $table->string('store_phone');
            //Billing address
            $table->string('name');
            $table->string('surname');
            $table->enum('user_type',['individual', 'institutional']);
            $table->string('company');
            $table->string('tax_no');
            $table->string('country');
            $table->string('city');
            $table->text('address');
            $table->text('address_type');
            $table->string('post_code');
            $table->string('telephone');
            //End Billing address
            $table->enum('method',['','online','cash']);
            $table->string('bank');
            $table->text('products');
            $table->text('coupons');
            $table->string('currency_code');
            $table->string('currency_prefix');
            $table->string('currency_suffix');
            $table->decimal('total','50');
            $table->enum('status',['paid','unpaid']);
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
        Schema::dropIfExists('order_payment');
    }
}
