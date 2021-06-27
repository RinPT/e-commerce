<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreDiscount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_discount', function (Blueprint $table) {
            $table->id();
            $table->foreignId('store_id')->unique()->constrained('store')->onDelete('cascade');
            $table->integer('store_discount')->default(0);
            $table->integer('main_discount')->default(0);
            $table->text('description');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
        });

        DB::table('store_discount')->insert([
            'store_id' => '1',
            'store_discount' => '3',
            'main_discount' => '3',
            'description' => 'New Year Discount',
            'start_date' => \Carbon\Carbon::today(),
            'end_date' => \Carbon\Carbon::create('2021','06','31'),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_discount');
    }
}
