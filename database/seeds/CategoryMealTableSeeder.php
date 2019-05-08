<?php

use Illuminate\Database\Seeder;

class CategoryMealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1,10) as $index) {
            static $order = 1;
            static $descOrder = 10;
            DB::table('category_meal')->insert([
                'category_id' => $order++,
                'meal_id' => $descOrder--,
            ]);
        }
    }
}
