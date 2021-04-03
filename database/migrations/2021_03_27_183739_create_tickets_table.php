<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id('ticket_id');
            $table->unsignedbiginteger('store_id');
            //$table->foreign('store_id')->references('store_id')->on('Store');
            $table->text('title');
            $table->text('message');
            $table->enum('status',['open', 'closed', 'answered']);
            $table->enum('urgency',['high', 'medium','low']);
            $table->json('attachments');
            $table->tinyInteger('store_unread');
            $table->tinyInteger('author_unread');
            $table->unsignedbiginteger('department_id')->references('department_id')->on('ticket_departments');
            $table->foreign('department_id')->references('department_id')->on('ticket_departments');
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
        Schema::dropIfExists('tickets');
    }
}
