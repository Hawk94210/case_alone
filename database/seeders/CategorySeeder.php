<?php

namespace Database\Seeders;

use App\Models\Category;
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
        $cate = new Category();
        $cate->name = 'Công việc';
        $cate->save();

        $cate = new Category();
        $cate->name = 'Việc cá nhân';
        $cate->save();
    }
}
