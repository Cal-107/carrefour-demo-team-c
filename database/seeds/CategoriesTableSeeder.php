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
        $new_category = new Category();
        $new_category->category_name = 'Enoteca';
        $new_category->slug = Str::slug($new_category->category_name, '-');
        $new_category->img = 'text';
        $new_category->save();
    }
}
