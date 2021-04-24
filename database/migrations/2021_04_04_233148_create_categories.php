<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->string('image');
            $table->string('meta_title');
            $table->string('meta_keywords');
            $table->text('meta_description');
            $table->integer('parent_id');
            $table->integer('sort_order');
            $table->tinyInteger('status');
            $table->timestamps();
        });


        //parent categories :

        DB::table('categories')->insert([
            'name' => 'Woman',
            'description' => 'woman products',
            'image' => ' ',
            'meta_title' =>'woman',
            'meta_keywords' => 'woman',
            'meta_description' => 'woman products',
            'parent_id' =>0,
            'sort_order' => 1,
            'status' =>1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('categories')->insert([
            'name' => 'Man',
            'description' => 'man products',
            'image' => ' ',
            'meta_title' =>'man',
            'meta_keywords' => 'man',
            'meta_description' => 'man products',
            'parent_id' =>0,
            'sort_order' => 1,
            'status' =>1,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);

        DB::table('categories')->insert([
                'name' => 'Kids',
                'description' => 'kids products',
                'image' => ' ',
                'meta_title' =>'kids',
                'meta_keywords' => 'kids',
                'meta_description' => 'kids products',
                'parent_id' =>0,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Home',
                'description' => 'home products',
                'image' => ' ',
                'meta_title' =>'home',
                'meta_keywords' => 'home',
                'meta_description' => 'home products',
                'parent_id' =>0,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Market',
                'description' => 'market products',
                'image' => ' ',
                'meta_title' =>'market',
                'meta_keywords' => 'market',
                'meta_description' => 'market products',
                'parent_id' =>0,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Cosmetics',
                'description' => 'cosmetic products',
                'image' => ' ',
                'meta_title' =>'cosmetic',
                'meta_keywords' => 'cosmetic',
                'meta_description' => 'cosmetic products',
                'parent_id' =>0,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Electronics',
                'description' => 'electronics',
                'image' => ' ',
                'meta_title' =>'electronics',
                'meta_keywords' => 'electronics',
                'meta_description' => 'electronics',
                'parent_id' =>0,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of woman: Level 1

        DB::table('categories')->insert([
                'name' => 'Clothing',
                'description' => 'womans clothings ',
                'image' => ' ',
                'meta_title' =>'clothing',
                'meta_keywords' => 'clothing',
                'meta_description' => 'womans clothings',
                'parent_id' =>1,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        DB::table('categories')->insert([
                'name' => 'Shoes',
                'description' => 'womans shoes ',
                'image' => ' ',
                'meta_title' =>'shoes',
                'meta_keywords' => 'shoes',
                'meta_description' => 'womans shoes',
                'parent_id' =>1,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Sports and Outdoor for women',
                'description' => 'sports and outdoor',
                'image' => ' ',
                'meta_title' =>'sports and outdoor',
                'meta_keywords' => 'sports and outdoor',
                'meta_description' => 'sports and outdoor',
                'parent_id' =>1,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of woman: Level 2 (Clothing)

        DB::table('categories')->insert([
                'name' => 'Dresses',
                'description' => 'womans dresses',
                'image' => ' ',
                'meta_title' =>'dresses',
                'meta_keywords' => 'dresses',
                'meta_description' => 'womans dresses',
                'parent_id' =>8,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Tops for Women',
                'description' => 'womans tops',
                'image' => ' ',
                'meta_title' =>'tops',
                'meta_keywords' => 'tops',
                'meta_description' => 'womans tops',
                'parent_id' =>8,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bottoms for Women',
                'description' => 'womans bottoms',
                'image' => ' ',
                'meta_title' =>'bottoms',
                'meta_keywords' => 'bottoms',
                'meta_description' => 'womans bottoms',
                'parent_id' =>8,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Plus Size for Women',
                'description' => 'womans plus size',
                'image' => ' ',
                'meta_title' =>'plus size',
                'meta_keywords' => 'plus size',
                'meta_description' => 'womans plus size',
                'parent_id' =>8,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of woman: Level 2 (Shoes)

        DB::table('categories')->insert([
                'name' => 'Casual Woman',
                'description' => 'womans casual shoes',
                'image' => ' ',
                'meta_title' =>'casual',
                'meta_keywords' => 'casual',
                'meta_description' => 'womans casual shoes',
                'parent_id' =>9,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Formal Woman',
                'description' => 'womans formal shoes',
                'image' => ' ',
                'meta_title' =>'formal',
                'meta_keywords' => 'formal',
                'meta_description' => 'womans formal shoes',
                'parent_id' =>9,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of woman: Level 2 (Sports and Outdoor)

        DB::table('categories')->insert([
                'name' => 'Sports Clothing for Women',
                'description' => 'womans sports clothing',
                'image' => ' ',
                'meta_title' =>'sports clothing',
                'meta_keywords' => 'sports clothing',
                'meta_description' => 'womans sports clothing',
                'parent_id' =>10,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Equipment for Women',
                'description' => 'womans sports equipment',
                'image' => ' ',
                'meta_title' =>'sports equipment',
                'meta_keywords' => 'sports equipment',
                'meta_description' => 'womans sports equipment',
                'parent_id' =>10,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Nutrition for Women',
                'description' => 'womans sports nutrition',
                'image' => ' ',
                'meta_title' =>' sports nutrition',
                'meta_keywords' => ' sports nutrition',
                'meta_description' => 'womans  sports nutrition',
                'parent_id' =>10,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);



        //sub categories of man: Level 1
        
        DB::table('categories')->insert([
                'name' => 'Men Clothing',
                'description' => 'mans clothings ',
                'image' => ' ',
                'meta_title' =>'mans clothing',
                'meta_keywords' => 'mans clothing',
                'meta_description' => 'mans clothings',
                'parent_id' =>2,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        DB::table('categories')->insert([
                'name' => 'Men Shoes',
                'description' => 'mans shoes ',
                'image' => ' ',
                'meta_title' =>'mans shoes',
                'meta_keywords' => 'mans shoes',
                'meta_description' => 'mans shoes',
                'parent_id' =>2,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Sports and Outdoor for Men',
                'description' => 'sports and outdoor',
                'image' => ' ',
                'meta_title' =>'sports and outdoor',
                'meta_keywords' => 'sports and outdoor',
                'meta_description' => 'sports and outdoor',
                'parent_id' =>2,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of man: Level 2 (Clothing)

        DB::table('categories')->insert([
                'name' => 'Tops for Men',
                'description' => 'mans tops',
                'image' => ' ',
                'meta_title' =>'tops',
                'meta_keywords' => 'tops',
                'meta_description' => 'mans tops',
                'parent_id' =>20,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bottoms for Men',
                'description' => 'mans bottoms',
                'image' => ' ',
                'meta_title' =>'bottoms',
                'meta_keywords' => 'bottoms',
                'meta_description' => 'mans bottoms',
                'parent_id' =>20,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Plus Size for Men',
                'description' => 'mans plus size',
                'image' => ' ',
                'meta_title' =>'plus size',
                'meta_keywords' => 'plus size',
                'meta_description' => 'mans plus size',
                'parent_id' =>20,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of man: Level 2 (Shoes)

        DB::table('categories')->insert([
                'name' => 'Casual for Men',
                'description' => 'mans casual shoes',
                'image' => ' ',
                'meta_title' =>'casual',
                'meta_keywords' => 'casual',
                'meta_description' => 'mans casual shoes',
                'parent_id' =>21,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Formal for Men',
                'description' => 'mans formal shoes',
                'image' => ' ',
                'meta_title' =>'formal',
                'meta_keywords' => 'formal',
                'meta_description' => 'mans formal shoes',
                'parent_id' =>21,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of woman: Level 2 (Sports and Outdoor)

        DB::table('categories')->insert([
                'name' => 'Sports Clothing for Men',
                'description' => 'mans sports clothing',
                'image' => ' ',
                'meta_title' =>'sports clothing',
                'meta_keywords' => 'sports clothing',
                'meta_description' => 'mans sports clothing',
                'parent_id' =>22,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Equipment for Men',
                'description' => 'mans sports equipment',
                'image' => ' ',
                'meta_title' =>'sports equipment',
                'meta_keywords' => 'sports equipment',
                'meta_description' => 'mans sports equipment',
                'parent_id' =>22,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Nutrition for Men',
                'description' => 'mans sports nutrition',
                'image' => ' ',
                'meta_title' =>' sports nutrition',
                'meta_keywords' => ' sports nutrition',
                'meta_description' => 'mans  sports nutrition',
                'parent_id' =>22,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
       

        //sub categories of kids: Level 1

        DB::table('categories')->insert([
                'name' => 'Babies',
                'description' => 'babies',
                'image' => ' ',
                'meta_title' =>'babies',
                'meta_keywords' => 'babies',
                'meta_description' => 'babies',
                'parent_id' =>3,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        DB::table('categories')->insert([
                'name' => 'Girls',
                'description' => 'girls',
                'image' => ' ',
                'meta_title' =>'girls',
                'meta_keywords' => 'girls',
                'meta_description' => 'girls',
                'parent_id' =>3,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Boys',
                'description' => 'boys',
                'image' => ' ',
                'meta_title' =>'boys',
                'meta_keywords' => 'boys',
                'meta_description' => 'boys',
                'parent_id' =>3,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        DB::table('categories')->insert([
                'name' => 'Toys',
                'description' => 'toys',
                'image' => ' ',
                'meta_title' =>'toys',
                'meta_keywords' => 'toys',
                'meta_description' => 'toys',
                'parent_id' =>3,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Nutrition for Kids',
                'description' => 'nutrition for kids',
                'image' => ' ',
                'meta_title' =>'nutrition for kids',
                'meta_keywords' => 'nutrition for kids',
                'meta_description' => 'nutrition for kids',
                'parent_id' =>3,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        
        
        //sub categories of kids: Level 2 (Babies)

        DB::table('categories')->insert([
                'name' => 'Baby Care',
                'description' => 'baby care',
                'image' => ' ',
                'meta_title' =>'baby care',
                'meta_keywords' => 'baby care',
                'meta_description' => 'baby care',
                'parent_id' =>31,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Baby Clothing',
                'description' => 'baby clothing',
                'image' => ' ',
                'meta_title' =>'baby clothing',
                'meta_keywords' => 'baby clothing',
                'meta_description' => 'baby clothing',
                'parent_id' =>31,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Hospital Needs',
                'description' => 'hospital needs',
                'image' => ' ',
                'meta_title' =>'hospital needs',
                'meta_keywords' => 'hospital needs',
                'meta_description' => 'hospital needs',
                'parent_id' =>31,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Transportation and Safety',
                'description' => 'transportation and safety',
                'image' => ' ',
                'meta_title' =>'transportation and safety',
                'meta_keywords' => 'transportation and safety',
                'meta_description' => 'transportation and safety',
                'parent_id' =>31,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        
        //sub categories of kids: Level 2 (Girls)

        DB::table('categories')->insert([
                'name' => 'Tops for Girls',
                'description' => 'girl tops',
                'image' => ' ',
                'meta_title' =>'tops',
                'meta_keywords' => 'tops',
                'meta_description' => 'girl tops',
                'parent_id' =>32,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bottoms for Girls',
                'description' => 'girl bottoms',
                'image' => ' ',
                'meta_title' =>'bottoms',
                'meta_keywords' => 'bottoms',
                'meta_description' => 'girl bottoms',
                'parent_id' =>32,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Plus Size for Girls',
                'description' => 'girl plus size',
                'image' => ' ',
                'meta_title' =>'plus size',
                'meta_keywords' => 'plus size',
                'meta_description' => 'girl plus size',
                'parent_id' =>32,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Shoes for Girls',
                'description' => 'girl plus size',
                'image' => ' ',
                'meta_title' =>'plus size',
                'meta_keywords' => 'plus size',
                'meta_description' => 'girl plus size',
                'parent_id' =>32,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of kids: Level 2 (Boys)

        DB::table('categories')->insert([
                'name' => 'Tops for Boys',
                'description' => 'boy tops',
                'image' => ' ',
                'meta_title' =>'tops',
                'meta_keywords' => 'tops',
                'meta_description' => 'boy tops',
                'parent_id' =>33,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bottoms for Boys',
                'description' => 'boy bottoms',
                'image' => ' ',
                'meta_title' =>'bottoms',
                'meta_keywords' => 'bottoms',
                'meta_description' => 'boy bottoms',
                'parent_id' =>33,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Plus Size for Boys',
                'description' => 'boy plus size',
                'image' => ' ',
                'meta_title' =>'plus size',
                'meta_keywords' => 'plus size',
                'meta_description' => 'boy plus size',
                'parent_id' =>33,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Shoes for Boys',
                'description' => 'boy plus size',
                'image' => ' ',
                'meta_title' =>'plus size',
                'meta_keywords' => 'plus size',
                'meta_description' => 'boy plus size',
                'parent_id' =>33,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of kids: Level 2 (Toys)

        DB::table('categories')->insert([
                'name' => 'Educational Toys',
                'description' => 'educational',
                'image' => ' ',
                'meta_title' =>'educational',
                'meta_keywords' => 'educational',
                'meta_description' => 'educational',
                'parent_id' =>34,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Board Games',
                'description' => 'board',
                'image' => ' ',
                'meta_title' =>'board',
                'meta_keywords' => 'board',
                'meta_description' => 'board',
                'parent_id' =>34,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bikes,Skates and Ride-ons',
                'description' => 'ride_ons',
                'image' => ' ',
                'meta_title' =>'ride_ons',
                'meta_keywords' => 'ride_ons',
                'meta_description' => 'ride_ons',
                'parent_id' =>34,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Dolls and Puppets',
                'description' => 'dolls and puppets',
                'image' => ' ',
                'meta_title' =>'dolls and puppets',
                'meta_keywords' => 'dolls and puppets',
                'meta_description' => 'dolls and puppets',
                'parent_id' =>34,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of kids: Level 2 (Nutrition)

        DB::table('categories')->insert([
                'name' => 'Bottle and Pacifier',
                'description' => 'bottle and pacifier',
                'image' => ' ',
                'meta_title' =>'bottle and pacifier',
                'meta_keywords' => 'bottle and pacifier',
                'meta_description' => 'bottle and pacifier',
                'parent_id' =>35,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Highchairs',
                'description' => 'highchairs',
                'image' => ' ',
                'meta_title' =>'highchairs',
                'meta_keywords' => 'highchairs',
                'meta_description' => 'highchairs',
                'parent_id' =>35,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Baby Formulas',
                'description' => 'formulas',
                'image' => ' ',
                'meta_title' =>'formulas',
                'meta_keywords' => 'formulas',
                'meta_description' => 'formulas',
                'parent_id' =>35,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //market cosmetics electronics

        //sub categories of home: Level 1 

        DB::table('categories')->insert([
                'name' => 'Kitchen',
                'description' => 'kitchen',
                'image' => ' ',
                'meta_title' =>'kitchen',
                'meta_keywords' => 'kitchen',
                'meta_description' => 'kitchen',
                'parent_id' =>4,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bathroom',
                'description' => 'bathroom',
                'image' => ' ',
                'meta_title' =>'bathroom',
                'meta_keywords' => 'bathroom',
                'meta_description' => 'bathroom',
                'parent_id' =>4,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Lightning',
                'description' => 'lightning',
                'image' => ' ',
                'meta_title' =>'lightning',
                'meta_keywords' => 'lightning',
                'meta_description' => 'lightning',
                'parent_id' =>4,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Furniture',
                'description' => 'furniture',
                'image' => ' ',
                'meta_title' =>'furniture',
                'meta_keywords' => 'furniture',
                'meta_description' => 'furniture',
                'parent_id' =>4,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Decoration',
                'description' => 'decoration',
                'image' => ' ',
                'meta_title' =>'decoration',
                'meta_keywords' => 'decoration',
                'meta_description' => 'decoration',
                'parent_id' =>4,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        
        //sub categories of home: Level 2 (Kitchen) 

        DB::table('categories')->insert([
                'name' => 'Dinner Sets',
                'description' => 'dinner sets',
                'image' => ' ',
                'meta_title' =>'dinner sets',
                'meta_keywords' => 'dinner sets',
                'meta_description' => 'dinner sets',
                'parent_id' =>55,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Cutlery Sets',
                'description' => 'cutlery sets',
                'image' => ' ',
                'meta_title' =>'cutlery sets',
                'meta_keywords' => 'cutlery sets',
                'meta_description' => 'cutlery sets',
                'parent_id' =>55,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Cups and Mugs',
                'description' => 'cups and mugs',
                'image' => ' ',
                'meta_title' =>'cups and mugs',
                'meta_keywords' => 'cups and mugs',
                'meta_description' => 'cups and mugs',
                'parent_id' =>55,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Oven and Cake Molds',
                'description' => 'molds',
                'image' => ' ',
                'meta_title' =>'molds',
                'meta_keywords' => 'molds',
                'meta_description' => 'molds',
                'parent_id' =>55,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Kettles',
                'description' => 'kettles',
                'image' => ' ',
                'meta_title' =>'kettles',
                'meta_keywords' => 'kettles',
                'meta_description' => 'kettles',
                'parent_id' =>55,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Cookware',
                'description' => 'cookware',
                'image' => ' ',
                'meta_title' =>'cookware',
                'meta_keywords' => 'cookware',
                'meta_description' => 'cookware',
                'parent_id' =>55,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of home: Level 2 (Bathroom) 

        DB::table('categories')->insert([
                'name' => 'Towel Set',
                'description' => 'towel sets',
                'image' => ' ',
                'meta_title' =>'towel sets',
                'meta_keywords' => 'towel sets',
                'meta_description' => 'towel sets',
                'parent_id' =>56,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        DB::table('categories')->insert([
                'name' => 'Bath Mats',
                'description' => 'bath mats',
                'image' => ' ',
                'meta_title' =>'bath mats',
                'meta_keywords' => 'bath mats',
                'meta_description' => 'bath mats',
                'parent_id' =>56,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bath Sets',
                'description' => 'bath sets',
                'image' => ' ',
                'meta_title' =>'bath sets',
                'meta_keywords' => 'bath sets',
                'meta_description' => 'bath sets',
                'parent_id' =>56,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of home: Level 2 (Lightning)

        DB::table('categories')->insert([
                'name' => 'Chandelier',
                'description' => 'chandelier',
                'image' => ' ',
                'meta_title' =>'chandelier',
                'meta_keywords' => 'chandelier',
                'meta_description' => 'chandelier',
                'parent_id' =>57,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Lamp',
                'description' => 'lamp',
                'image' => ' ',
                'meta_title' =>'lamp',
                'meta_keywords' => 'lamp',
                'meta_description' => 'lamp',
                'parent_id' =>57,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Lampshade',
                'description' => 'lampshade',
                'image' => ' ',
                'meta_title' =>'lampshade',
                'meta_keywords' => 'lampshade',
                'meta_description' => 'lampshade',
                'parent_id' =>57,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of home: Level 2 (Furniture)

        DB::table('categories')->insert([
                'name' => 'Dining Room',
                'description' => 'dining room',
                'image' => ' ',
                'meta_title' =>'dining room',
                'meta_keywords' => 'dining room',
                'meta_description' => 'dining room',
                'parent_id' =>58,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Living Room',
                'description' => 'living room',
                'image' => ' ',
                'meta_title' =>'living room',
                'meta_keywords' => 'dining room',
                'meta_description' => 'living room',
                'parent_id' =>58,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bed Room',
                'description' => 'bed room',
                'image' => ' ',
                'meta_title' =>'bed room',
                'meta_keywords' => 'bed room',
                'meta_description' => 'bed room',
                'parent_id' =>58,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Study Room',
                'description' => 'study room',
                'image' => ' ',
                'meta_title' =>'study room',
                'meta_keywords' => 'study room',
                'meta_description' => 'study room',
                'parent_id' =>58,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of home: Level 2 (Decoration)   

        DB::table('categories')->insert([
                'name' => 'Mirrors',
                'description' => 'mirrors',
                'image' => ' ',
                'meta_title' =>'mirrors',
                'meta_keywords' => 'mirrors',
                'meta_description' => 'mirrors',
                'parent_id' =>59,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Wall Clocks',
                'description' => 'wall clocks',
                'image' => ' ',
                'meta_title' =>'wall clocks',
                'meta_keywords' => 'wall clocks',
                'meta_description' => 'wall clocks',
                'parent_id' =>59,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Accessories',
                'description' => 'accessories',
                'image' => ' ',
                'meta_title' =>'accessories',
                'meta_keywords' => 'accessories',
                'meta_description' => 'accessories',
                'parent_id' =>59,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of Market: Level 1

        DB::table('categories')->insert([
                'name' => 'Cleaning',
                'description' => 'cleaning',
                'image' => ' ',
                'meta_title' =>'cleaning',
                'meta_keywords' => 'cleaning',
                'meta_description' => 'cleaning',
                'parent_id' =>5,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Food',
                'description' => 'food',
                'image' => ' ',
                'meta_title' =>'food',
                'meta_keywords' => 'food',
                'meta_description' => 'food',
                'parent_id' =>5,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Health',
                'description' => 'health',
                'image' => ' ',
                'meta_title' =>'health',
                'meta_keywords' => 'health',
                'meta_description' => 'health',
                'parent_id' =>5,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Petshop',
                'description' => 'petshop',
                'image' => ' ',
                'meta_title' =>'petshop',
                'meta_keywords' => 'petshop',
                'meta_description' => 'petshop',
                'parent_id' =>5,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of Market: Level 2 (Cleaning)

        DB::table('categories')->insert([
                'name' => 'Linen',
                'description' => 'linen',
                'image' => ' ',
                'meta_title' =>'linen',
                'meta_keywords' => 'linen',
                'meta_description' => 'linen',
                'parent_id' =>79,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Dishes',
                'description' => 'dishes',
                'image' => ' ',
                'meta_title' =>'dishes',
                'meta_keywords' => 'dishes',
                'meta_description' => 'dishes',
                'parent_id' =>79,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'House Cleaning',
                'description' => 'house cleaning',
                'image' => ' ',
                'meta_title' =>'house cleaning',
                'meta_keywords' => 'house cleaning',
                'meta_description' => 'house cleaning',
                'parent_id' =>79,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of Market: Level 2 (Food)
        DB::table('categories')->insert([
                'name' => 'Drinks',
                'description' => 'drinks',
                'image' => ' ',
                'meta_title' =>'drinks',
                'meta_keywords' => 'drinks',
                'meta_description' => 'drinks',
                'parent_id' =>80,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Organics',
                'description' => 'organic',
                'image' => ' ',
                'meta_title' =>'organic',
                'meta_keywords' => 'organic',
                'meta_description' => 'organic',
                'parent_id' =>80,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Diabetics',
                'description' => 'diabetic',
                'image' => ' ',
                'meta_title' =>'diabetic',
                'meta_keywords' => 'diabetic',
                'meta_description' => 'diabetic',
                'parent_id' =>80,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of Market: Level 2 (Health)
        DB::table('categories')->insert([
                'name' => 'Hygene',
                'description' => 'hygene',
                'image' => ' ',
                'meta_title' =>'hygene',
                'meta_keywords' => 'hygene',
                'meta_description' => 'hygene',
                'parent_id' =>81,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Supplements',
                'description' => 'supplements',
                'image' => ' ',
                'meta_title' =>'supplements',
                'meta_keywords' => 'supplements',
                'meta_description' => 'supplements',
                'parent_id' =>81,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of Market: Level 2 (Petshop)
        DB::table('categories')->insert([
                'name' => 'Cat Food',
                'description' => 'cat food',
                'image' => ' ',
                'meta_title' =>'cat food',
                'meta_keywords' => 'cat food',
                'meta_description' => 'cat food',
                'parent_id' =>82,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Cat Litter',
                'description' => 'cat litter',
                'image' => ' ',
                'meta_title' =>'cat litter',
                'meta_keywords' => 'cat litter',
                'meta_description' => 'cat litter',
                'parent_id' =>82,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Dog Food',
                'description' => 'dog food',
                'image' => ' ',
                'meta_title' =>'dog food',
                'meta_keywords' => 'dog food',
                'meta_description' => 'dog food',
                'parent_id' =>82,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bird Food',
                'description' => 'bird food',
                'image' => ' ',
                'meta_title' =>'bird food',
                'meta_keywords' => 'bird food',
                'meta_description' => 'bird food',
                'parent_id' =>82,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of cosmetics: Level 1

        DB::table('categories')->insert([
                'name' => 'Make up',
                'description' => 'make up',
                'image' => ' ',
                'meta_title' =>'make up',
                'meta_keywords' => 'make up',
                'meta_description' => 'make up',
                'parent_id' =>6,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Haircare',
                'description' => 'haircare',
                'image' => ' ',
                'meta_title' =>'haircare',
                'meta_keywords' => 'haircare',
                'meta_description' => 'haircare',
                'parent_id' =>6,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Parfume and Deodorant',
                'description' => 'parfume and deodorant',
                'image' => ' ',
                'meta_title' =>'parfume and deodorant',
                'meta_keywords' => 'parfume and deodorant',
                'meta_description' => 'parfume and deodorant',
                'parent_id' =>6,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of cosmetics: Level 2 (Make up)

        DB::table('categories')->insert([
                'name' => 'Eye Makeup',
                'description' => 'eye makeup',
                'image' => ' ',
                'meta_title' =>'eye makeup',
                'meta_keywords' => 'eye makeup',
                'meta_description' => 'eye makeup',
                'parent_id' =>95,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Skin Makeup',
                'description' => 'skin makeup',
                'image' => ' ',
                'meta_title' =>'skin makeup',
                'meta_keywords' => 'skin makeup',
                'meta_description' => 'skin makeup',
                'parent_id' =>95,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Lip Makeup',
                'description' => 'lip makeup',
                'image' => ' ',
                'meta_title' =>'lip makeup',
                'meta_keywords' => 'lip makeup',
                'meta_description' => 'lip makeup',
                'parent_id' =>95,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Nail and Handcare',
                'description' => 'nail and handcare',
                'image' => ' ',
                'meta_title' =>'nail and handcare',
                'meta_keywords' => 'nail and handcare',
                'meta_description' => 'nail and handcare',
                'parent_id' =>95,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of cosmetics: Level 2 (Hair Care)

        DB::table('categories')->insert([
                'name' => 'Shampoo',
                'description' => 'shampoo',
                'image' => ' ',
                'meta_title' =>'shampoo',
                'meta_keywords' => 'shampoo',
                'meta_description' => 'shampoo',
                'parent_id' =>96,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Styling',
                'description' => 'styling',
                'image' => ' ',
                'meta_title' =>'styling',
                'meta_keywords' => 'styling',
                'meta_description' => 'styling',
                'parent_id' =>96,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Coloring',
                'description' => 'coloring',
                'image' => ' ',
                'meta_title' =>'coloring',
                'meta_keywords' => 'coloring',
                'meta_description' => 'coloring',
                'parent_id' =>96,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Serum and Mask',
                'description' => 'serum and mask',
                'image' => ' ',
                'meta_title' =>'serum and mask',
                'meta_keywords' => 'serum and mask',
                'meta_description' => 'serum and mask',
                'parent_id' =>96,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of cosmetics: Level 2 (Parfume and Deodorant)

        DB::table('categories')->insert([
                'name' => 'Parfume',
                'description' => 'parfume',
                'image' => ' ',
                'meta_title' =>'parfume',
                'meta_keywords' => 'parfume',
                'meta_description' => 'parfume',
                'parent_id' =>97,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Deodorant',
                'description' => 'deodorant',
                'image' => ' ',
                'meta_title' =>'deodorant',
                'meta_keywords' => 'deodorant',
                'meta_description' => 'deodorant',
                'parent_id' =>97,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Roll on',
                'description' => 'roll on',
                'image' => ' ',
                'meta_title' =>'roll on',
                'meta_keywords' => 'roll on',
                'meta_description' => 'roll on',
                'parent_id' =>97,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Body Spray',
                'description' => 'body spray',
                'image' => ' ',
                'meta_title' =>'body spray',
                'meta_keywords' => 'body spray',
                'meta_description' => 'body spray',
                'parent_id' =>97,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);


        //sub categories of electronics: Level 1

        DB::table('categories')->insert([
                'name' => 'Gaming',
                'description' => 'gaming',
                'image' => ' ',
                'meta_title' =>'gaming',
                'meta_keywords' => 'gaming',
                'meta_description' => 'gaming',
                'parent_id' =>7,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Computers and Tablets',
                'description' => 'computers and tablets',
                'image' => ' ',
                'meta_title' =>'computers and tablets',
                'meta_keywords' => 'computers and tablets',
                'meta_description' => 'computers and tablets',
                'parent_id' =>7,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => '
Household Appliances',
                'description' => 'household appliances',
                'image' => ' ',
                'meta_title' =>'household appliances',
                'meta_keywords' => 'household appliances',
                'meta_description' => 'household appliances',
                'parent_id' =>7,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'TV and Mobile Phones',
                'description' => 'TV and Mobile Phones',
                'image' => ' ',
                'meta_title' =>'TV and Mobile Phones',
                'meta_keywords' => 'TV and Mobile Phones',
                'meta_description' => 'TV and Mobile Phones',
                'parent_id' =>7,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Visual And Audio Equipment',
                'description' => 'Visual And Audio Equipment',
                'image' => ' ',
                'meta_title' =>'Visual And Audio Equipment',
                'meta_keywords' => 'Visual And Audio Equipment',
                'meta_description' => 'Visual And Audio Equipment',
                'parent_id' =>7,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of electronics: Level 2 (Gaming)
        DB::table('categories')->insert([
                'name' => 'Playstation',
                'description' => 'playstation',
                'image' => ' ',
                'meta_title' =>'playstation',
                'meta_keywords' => 'playstation',
                'meta_description' => 'playstation',
                'parent_id' =>110,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Playstation Games',
                'description' => 'playstation games',
                'image' => ' ',
                'meta_title' =>'playstation games',
                'meta_keywords' => 'playstation games',
                'meta_description' => 'playstation games',
                'parent_id' =>110,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Xbox',
                'description' => 'xbox',
                'image' => ' ',
                'meta_title' =>'xbox',
                'meta_keywords' => 'xbox',
                'meta_description' => 'xbox',
                'parent_id' =>110,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Nintendo',
                'description' => 'nintendo',
                'image' => ' ',
                'meta_title' =>'nintendo',
                'meta_keywords' => 'nintendo',
                'meta_description' => 'nintendo',
                'parent_id' =>110,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Console Accessories',
                'description' => 'console accessories',
                'image' => ' ',
                'meta_title' =>'console accessories',
                'meta_keywords' => 'console accessories',
                'meta_description' => 'console accessories',
                'parent_id' =>110,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of electronics: Level 3 (PlayStation Games)

        DB::table('categories')->insert([
                'name' => 'Multi Player',
                'description' => 'Multi Player',
                'image' => ' ',
                'meta_title' =>'Multi Player',
                'meta_keywords' => 'Multi Player',
                'meta_description' => 'Multi Player',
                'parent_id' =>116,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Single Player',
                'description' => 'Single Player',
                'image' => ' ',
                'meta_title' =>'Single Player',
                'meta_keywords' => 'Single Player',
                'meta_description' => 'Single Player',
                'parent_id' =>116,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        
        //sub categories of electronics: Level 4 (MultiPlayer Games)

        DB::table('categories')->insert([
                'name' => 'Racing Games',
                'description' => 'Racing Games',
                'image' => ' ',
                'meta_title' =>'Racing Games',
                'meta_keywords' => 'Racing Games',
                'meta_description' => 'Racing Games',
                'parent_id' =>120,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of electronics: Level 4 (SinglePlayer Games)

        DB::table('categories')->insert([
                'name' => 'War Games',
                'description' => 'War Games',
                'image' => ' ',
                'meta_title' =>'War Games',
                'meta_keywords' => 'War Games',
                'meta_description' => 'War Games',
                'parent_id' =>121,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);
        
        //sub categories of electronics: Level 2 (Computers and Tablets)

        DB::table('categories')->insert([
                'name' => 'Laptop',
                'description' => 'laptop',
                'image' => ' ',
                'meta_title' =>'laptop',
                'meta_keywords' => 'laptop',
                'meta_description' => 'laptop',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Mouse',
                'description' => 'mouse',
                'image' => ' ',
                'meta_title' =>'mouse',
                'meta_keywords' => 'mouse',
                'meta_description' => 'mouse',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Keyboard',
                'description' => 'keyboard',
                'image' => ' ',
                'meta_title' =>'keyboard',
                'meta_keywords' => 'keyboard',
                'meta_description' => 'keyboard',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Monitor',
                'description' => 'monitor',
                'image' => ' ',
                'meta_title' =>'monitor',
                'meta_keywords' => 'monitor',
                'meta_description' => 'monitor',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Tablet',
                'description' => 'tablet',
                'image' => ' ',
                'meta_title' =>'tablet',
                'meta_keywords' => 'tablet',
                'meta_description' => 'tablet',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Mobile Phones',
                'description' => 'mobile phones',
                'image' => ' ',
                'meta_title' =>'mobile phones',
                'meta_keywords' => 'mobile phones',
                'meta_description' => 'mobile phones',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Powerbank',
                'description' => 'powerbank',
                'image' => ' ',
                'meta_title' =>'powerbank',
                'meta_keywords' => 'powerbank',
                'meta_description' => 'powerbank',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Charger',
                'description' => 'charger',
                'image' => ' ',
                'meta_title' =>'charger',
                'meta_keywords' => 'charger',
                'meta_description' => 'charger',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Phone Cases',
                'description' => 'phone cases',
                'image' => ' ',
                'meta_title' =>'phone cases',
                'meta_keywords' => 'phone cases',
                'meta_description' => 'phone cases',
                'parent_id' =>111,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of electronics: Level 2 (Household Appliances)

        DB::table('categories')->insert([
                'name' => 'Refrigerator',
                'description' => 'refrigerator',
                'image' => ' ',
                'meta_title' =>'refrigerator',
                'meta_keywords' => 'refrigerator',
                'meta_description' => 'refrigerator',
                'parent_id' =>112,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Washing Machine',
                'description' => 'washing machine',
                'image' => ' ',
                'meta_title' =>'washing machine',
                'meta_keywords' => 'washing machine',
                'meta_description' => 'washing machine',
                'parent_id' =>112,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Dishwasher',
                'description' => 'dishwasher',
                'image' => ' ',
                'meta_title' =>'dishwasher',
                'meta_keywords' => 'dishwasher',
                'meta_description' => 'dishwasher',
                'parent_id' =>112,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Bakery',
                'description' => 'bakery',
                'image' => ' ',
                'meta_title' =>'bakery',
                'meta_keywords' => 'bakery',
                'meta_description' => 'bakery',
                'parent_id' =>112,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Airconditioner',
                'description' => 'airconditioner',
                'image' => ' ',
                'meta_title' =>'airconditioner',
                'meta_keywords' => 'airconditioner',
                'meta_description' => 'airconditioner',
                'parent_id' =>112,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        //sub categories of electronics: Level 2 (TV and Mobile Phones)

            //no subcategory for this one yet.

        //sub categories of electronics: Level 2 (Visual And Audio Equipment)

        DB::table('categories')->insert([
                'name' => 'Earphones',
                'description' => 'earphones',
                'image' => ' ',
                'meta_title' =>'earphones',
                'meta_keywords' => 'earphones',
                'meta_description' => 'earphones',
                'parent_id' =>114,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Headphones',
                'description' => 'headphones',
                'image' => ' ',
                'meta_title' =>'headphones',
                'meta_keywords' => 'headphones',
                'meta_description' => 'headphones',
                'parent_id' =>114,
                'sort_order' => 1,
                'status' =>1,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ]);

        DB::table('categories')->insert([
                'name' => 'Speaker',
                'description' => 'speaker',
                'image' => ' ',
                'meta_title' =>'speaker',
                'meta_keywords' => 'speaker',
                'meta_description' => 'speaker',
                'parent_id' =>114,
                'sort_order' => 1,
                'status' =>1,
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
        Schema::dropIfExists('categories');
    }
}
