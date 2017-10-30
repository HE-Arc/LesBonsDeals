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
        $listCategories = ['Informatique','Automobile','Animal'];
        foreach ($listCategories as $category){
            DB::table('categories')->insert([
                'categorie' => $category,
            ]);
        }
    }
}
