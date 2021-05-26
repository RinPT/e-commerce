<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCountries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('iso_code',2);
            $table->tinyInteger('status');
            $table->timestamps();
        });

        $counts = json_decode(file_get_contents(public_path().DIRECTORY_SEPARATOR."country-by-abbreviation.json"));
        foreach ($counts as $count) {
            DB::table('countries')->insert([
                'name' => $count->country,
                'iso_code' => $count->abbreviation,
                'status' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
