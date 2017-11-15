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
        $category = new \App\Category([
            'title' => 'Bijoux'
        ]);

        $category->save();


        $listCategories = ['Informatique','Automobile','Animal'];
        foreach ($listCategories as $category){
            DB::table('categories')->insert([
                'title' => $category,
            ]);
        }
    }
}
