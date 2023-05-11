<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CreateCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
               'category_name'=>'Laptop'
            ],
            [
                'parent_category_id'=>1,
                'category_name'=>'Leveno'
            ],
            [
                'parent_category_id'=>1,
                'category_name'=>'HP',
            ],
        ];

        foreach ($categories as $key => $value) {
            Category::create($value);
        }
    }
}
