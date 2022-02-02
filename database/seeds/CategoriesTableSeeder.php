<?php

use Illuminate\Database\Seeder;
use Illuminate\Provider\Str;
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
        $new_category->name_category = 'Enoteca';
        $new_category->slug = Str::slug($category->name_category, '-');
        $new_category->image = 'text';
        $new_category->save();
    }
}
