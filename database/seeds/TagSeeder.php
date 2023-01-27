<?php

use Illuminate\Database\Seeder;
use App\Model\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'carne',
            'pesce',
            'vegetariano',
            'vegano',
            'senza lattosio',
        ];
        foreach($tags as $elem){

            $new_tag = new Tag();
            $new_tag->name = $elem;
            $new_tag->save();


        }
    }
}
