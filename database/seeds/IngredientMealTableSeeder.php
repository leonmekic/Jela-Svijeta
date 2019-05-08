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
        foreach (range(1,10) as $index) {
            static $order = 1;
            static $descOrder = 10;
            DB::table('ingredient_meal')->insert([
                'ingredient_id' => $order++,
                'meal_id' => $descOrder--,
            ]);
        }
    }
}
