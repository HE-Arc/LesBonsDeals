<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listCategories = ['Animaux','Automobiles','Bijoux','Informatique','Jeux vidéos'];
        foreach ($listCategories as $category){
            DB::table('categories')->insert([
                'title' => $category,
            ]);
        }
    }
}
