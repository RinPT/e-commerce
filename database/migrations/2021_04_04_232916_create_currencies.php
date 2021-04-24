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
            $table->timestamps();
        });


        DB::table('currencies')->insert([
            'name' => 'Turkish Lira',
            'code' => 'TL',
            'prefix' => '₺',
            'suffix' =>'₺',
            'rate' => 10,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('currencies')->insert([
            'name' => 'US Dollars',
            'code' => 'Dollars',
            'prefix' => '$',
            'suffix' =>'$',
            'rate' => 8,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('currencies')->insert([
            'name' => 'Euro',
            'code' => 'Euro',
            'prefix' => '€',
            'suffix' =>'€',
            'rate' => 9,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('currencies')->insert([
            'name' => 'Sterling Pound',
            'code' => 'GBP',
            'prefix' => '£',
            'suffix' =>'£',
            'rate' => 12,
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
