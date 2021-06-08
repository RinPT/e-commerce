<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('name')->unique();
            $table->text('value');
            $table->timestamps();
        });

        DB::table('product_attribute')->insert([
            [
                'product_id' => 1,
                'name' => 'material',
                'value' => 'Praesent id enim sit amet.Tdio',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'rope type',
                'value' => 'Praesent id enim sit amet.',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'claimed size',
                'value' => 'Praesent id enim sit',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'name' => 'recommended use',
                'value' => 'Praesent id enim sit amet.Tdio vulputate eleifend in in tortor. ellus massa. siti',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_attribute');
    }
}
