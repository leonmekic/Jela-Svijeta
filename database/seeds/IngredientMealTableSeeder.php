<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientMealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ingredientIds = DB::table('ingredients')->where('id' ,'>' ,0)->pluck('id')->toArray();
        $mealIds = DB::table('meals')->where('id' ,'>' ,0)->pluck('id')->toArray();

        foreach ((range(1, 10)) as $index)
        {
            DB::table('ingredient_meal')->insert(
                [
                    'ingredient_id' => $ingredientIds[array_rand($ingredientIds)],
                    'meal_id' => $mealIds[array_rand($mealIds)]
                ]
            );
        }
    }
}
