<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryMealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryIds = DB::table('category')->where('id' ,'>' ,0)->pluck('id')->toArray();
        $mealIds = DB::table('meals')->where('id' ,'>' ,0)->pluck('id')->toArray();

        foreach ((range(1, 10)) as $index)
        {
            DB::table('category_meal')->insert(
                [
                    'category_id' => $categoryIds[array_rand($categoryIds)],
                    'meal_id' => $mealIds[array_rand($mealIds)]
                ]
            );
        }
    }
}
