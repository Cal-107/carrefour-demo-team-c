<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Category;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = config('categories');
        
        foreach ($categories as $category) {
            $new_category = new Category();
            $new_category->category_name = $category['category_name'];
            $new_category->slug = Str::slug($category['category_name'], '-');
            $new_category->img = $category['img'];
            $new_category->class = $category['class'];
            $new_category->save();
        }
    }
}
