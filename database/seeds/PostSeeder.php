<?php

use Illuminate\Database\Seeder;
//dicitura per usare Faker
use Faker\Generator as Faker;
use App\Model\Post;
class PostSeeder extends Seeder
{

    /**
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {


       for ($i = 0; $i < 10; $i++) {

       $new_post = new Post();
       $new_post->title = $faker->words(5,true);
       $new_post->body = $faker->words(20,true);
       $new_post->save();
    }
     //   $new_post = new Post();
     //   $new_post->title = 'Titolone';
     //   $new_post->body = 'Corpo del post';
     //   $new_post->save();


    }
}




