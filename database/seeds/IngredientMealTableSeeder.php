<?php

use Illuminate\Database\Seeder;

class IngredientMealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ID = \App\Models\Ingredient::all()->pluck('id')->toArray();
        foreach (\App\Models\Meal::all()->pluck('id') as $id) {
            DB::table('ingredient_meal')->insert(
                [
                    'ingredient_id' => $ID[array_rand($ID)],
                    'meal_id'       => $id,
                ]
            );
        }
    }
}
