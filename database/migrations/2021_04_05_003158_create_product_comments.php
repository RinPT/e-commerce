<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('comment');
            $table->enum('product_rate',[1,2,3,4,5]);
            $table->enum('cargo_rate',[1,2,3,4,5]);
            $table->timestamps();
        });

        DB::table('product_comments')->insert([
            [
                'product_id' => 1,
                'user_id' => 1,
                'comment' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                'product_rate' => 4,
                'cargo_rate' => 1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'user_id' => 1,
                'comment' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
                'product_rate' => 3,
                'cargo_rate' => 5,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'product_id' => 1,
                'user_id' => 1,
                'comment' => 'It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged..',
                'product_rate' => 3,
                'cargo_rate' => 2,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_comments');
    }
}
