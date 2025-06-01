<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void {
        $categories = ['легкий', 'хрупкий', 'тяжелый'];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
