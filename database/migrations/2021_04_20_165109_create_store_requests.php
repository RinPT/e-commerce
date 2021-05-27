<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->text('logo')->nullable();
            $table->text('url')->nullable();
            $table->string('tax_no')->unique();
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->foreignId('product_cat_id')->constrained('categories')->onDelete('cascade');
            $table->string('city');
            $table->text('address');
            $table->string('phone');
            $table->text('notes')->default('');
            $table->enum('status',['accepted','rejected','waiting']);
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
        Schema::dropIfExists('store_requests');
    }
}
