<?php
use App\Model\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Antipasti',
            'Primi',
            'Secondi',
            'Contorni',
            'Dolci'
        ];

        foreach($categories as $elem){

            $new_category = new Category();
            $new_category->name = $elem;
            $new_category->save();


        }


    }
}
