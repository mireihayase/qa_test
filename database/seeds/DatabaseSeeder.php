<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $category_names = ['ニュース','主要アルト','マクロ情勢','技術','法'];
        foreach ($category_names as $category_name) App\Category::create(['name' => $category_name]);
    }
}
