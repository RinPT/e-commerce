<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('ticket_departments')->onDelete('cascade');
            $table->foreignId('store_id')->constrained('store')->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->enum('status',['open','answered','closed']);
            $table->enum('urgency',['low','medium','high','very high','critical']);
            $table->json('attachments')->default("[]");
            $table->tinyInteger('store_unread')->default(1);
            $table->tinyInteger('author_unread')->default(1);
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
