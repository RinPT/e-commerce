<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('banner');
            $table->string('header');
            $table->string('text');
            $table->string('btn_text');
            $table->string('btn_link');
            $table->timestamps();
        });

        DB::table('sliders')->insert([
            [
                'name' => 'banner 1',
                'banner' => 'banner_1.jpg',
                'header' => 'New Arrivals',
                'text' => 'Padlock',
                'btn_text' => 'Shop now!',
                'btn_link' => '#',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'banner 2',
                'banner' => 'banner_2.jpg',
                'header' => 'Old Arrivals',
                'text' => 'Padlock2',
                'btn_text' => 'Shop now!',
                'btn_link' => '#',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sliders');
    }
}
