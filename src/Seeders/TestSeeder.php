<?php
namespace PureIntento\InfinityCategory\Seeders;

use Illuminate\Database\Seeder;
use PureIntento\InfinityCategory\Models\Category;
use PureIntento\InfinityCategory\Models\CategoryLanguage;

class TestSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        for($i=0; $i<10000; $i++){
            $category= Category::create([
                "parent_id"=>rand(0,10000)
            ]);
            $categoryLanguage=CategoryLanguage::create([
                "language_id"=>1,
                "category_id"=>$category->id,
                "name"=>"test",
            ]);
        }
    }
}