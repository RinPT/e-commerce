<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_replies', function (Blueprint $table) {
            $table->id('ticket_reply_id');
            $table->unsignedbiginteger('author_id');
            $table->foreign('author_id')->references('author_id')->on('authors');

            $table->integer('rate');
            $table->json('attachments');
            $table->unsignedbiginteger('ticket_id');
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets');
            $table->integer('store_id');
            //$table->foreign('store_id')->references('store_id')->on('store');
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
        Schema::dropIfExists('ticket_replies');
    }
}
