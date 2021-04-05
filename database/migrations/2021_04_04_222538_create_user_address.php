<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string("name");
            $table->string("surname");
            $table->enum('user_type', ['individual', 'institutional']);
            $table->string("company")->nullable();
            $table->string("tax_no")->nullable();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->string("city");
            $table->text("address");
            $table->string("address_type");
            $table->string("postcode");
            $table->string("telephone");
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
        Schema::dropIfExists('user_address');
    }
}
