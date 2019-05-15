<?php

use Illuminate\Database\Seeder;

class MealTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ID = \App\Models\Tag::all()->pluck('id')->toArray();
        foreach (\App\Models\Meal::all()->pluck('id') as $id) {
            DB::table('meal_tag')->insert(
                [
                    'tag_id'  => $ID[array_rand($ID)],
                    'meal_id' => $id,
                ]
            );
        }
    }
}
