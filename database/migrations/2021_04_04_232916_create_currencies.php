<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrencies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('prefix');
            $table->string('suffix');
            $table->decimal('rate',10);
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('base')->default(0);
            $table->timestamps();
        });


        DB::table('currencies')->insert([
            'name' => 'Turkish Lira',
            'code' => 'TL',
            'prefix' => '₺',
            'suffix' =>'TL',
            'rate' => 1,
            'base' => 1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('currencies')->insert([
            'name' => 'US Dollars',
            'code' => 'USD',
            'prefix' => '$',
            'suffix' =>'USD',
            'rate' => 0.11,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('currencies')->insert([
            'name' => 'Euro',
            'code' => 'EUR',
            'prefix' => '€',
            'suffix' =>'EUR',
            'rate' => 0.09,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('currencies')->insert([
            'name' => 'Sterling Pound',
            'code' => 'GBP',
            'prefix' => '£',
            'suffix' =>'GBP',
            'rate' => 0.08,
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
        Schema::dropIfExists('currencies');
    }
}
