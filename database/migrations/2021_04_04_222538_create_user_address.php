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

        DB::table('user_address')->insert([
            'user_id' => 1,
            'name' => 'Samet',
            'surname' => 'ALEMDAROĞLU',
            'user_type' => 'individual',
            'country_id' => 224,
            'city' => 'Ordu',
            'address' => 'Mustafa Kemal Paşa Mah. Anadolu Sokak. No:25 Kat:4 Daire: 8',
            'address_type' => 'Home',
            'postcode' => '52400',
            'telephone' => '+905345722515',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('user_address')->insert([
            'user_id' => 1,
            'name' => 'Hüseyin',
            'surname' => 'ERDAĞLI',
            'user_type' => 'individual',
            'country_id' => 54,
            'city' => 'Famagusta',
            'address' => 'Mustafa Kemal Paşa Mah. Anadolu Sokak. No:25 Kat:4 Daire: 8',
            'address_type' => 'Work',
            'postcode' => '45000',
            'telephone' => '+905332769579',
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
        Schema::dropIfExists('user_address');
    }
}
