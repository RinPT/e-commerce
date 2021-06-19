<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketDepartmentCfields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_department_cfields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->constrained('ticket_departments')->onDelete('cascade');
            $table->string('name');
            $table->enum('type',['text','select']);
            $table->text('description');
            $table->json('select_options');
            $table->tinyInteger('required');
            $table->timestamps();
        });

        DB::table('ticket_department_cfields')->insert([
            'department_id' => 2,
            'name' => 'Custom Field',
            'type' => 'text',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'select_options' => "[]",
            'required' => 1,
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
        Schema::dropIfExists('ticket_department_cfields');
    }
}
