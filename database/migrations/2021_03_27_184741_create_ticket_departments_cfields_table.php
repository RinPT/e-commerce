<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDepartmentsCfieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_departments_Cfields', function (Blueprint $table) {
            $table->id('ticket_dep_cfield_id');
            $table->string('name');
            $table->string('type');
            $table->text('description');
            $table->text('select_options');
            $table->tinyInteger('required');
            $table->unsignedbiginteger('ticket_dep_id');
            $table->foreign('ticket_dep_id')->references('department_id')->on('ticket_departments');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_departments_cfields');
    }
}
