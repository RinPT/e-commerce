<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_logs', function (Blueprint $table) {
 
            $table->id('log_id');
            $table->unsignedbiginteger('ticket_id');
            $table->foreign('ticket_id')->references('ticket_id')->on('tickets');
            $table->unsignedbiginteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->string('username');
            $table->unsignedbiginteger('author_id');
            $table->foreign('author_id')->references('author_id')->on('authors');

            $table->text('description');
            $table->text('ip_address');
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
        Schema::dropIfExists('ticket_logs');
    }
}
