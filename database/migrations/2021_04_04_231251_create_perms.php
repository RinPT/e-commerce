<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePerms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perms', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });
        DB::table('perms')->insert([
            [
                'name' => 'Manage General Settings[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Currencies[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Orders[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Categories[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Products[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Discounts[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Cargos[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Advertisements[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Authors[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Stores[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Users[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Tickets[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Payments[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Logs[Author]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'View Products[Store]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'View Orders[Store]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'View Tickets[Store]',
                'created_at' => \Carbon\Carbon::now()
            ],
            [
                'name' => 'Manage Sliders[Author]',
                'created_at' => \Carbon\Carbon::now()
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
        Schema::dropIfExists('perms');
    }
}
