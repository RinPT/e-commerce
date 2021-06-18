<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->tinyInteger('status');
        });

        DB::table('ticket_departments')->insert([
            'name' => 'Pre-Sale',
            'description' => 'If you have any pre-sale questions, select here.',
            'status' => 1
        ]);

        DB::table('ticket_departments')->insert([
           'name' => 'Technical Support',
           'description' => 'If you have encountered any technical problems, select here.',
            'status' => 1
        ]);

        DB::table('ticket_departments')->insert([
            'name' => 'Complaint',
            'description' => 'If you have a problem with any product or thing, select here.',
            'status' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_departments');
    }
}
