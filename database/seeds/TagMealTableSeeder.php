<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagMealTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tagIds = DB::table('tags')->where('id' ,'>' ,0)->pluck('id')->toArray();
        $mealIds = DB::table('meals')->where('id' ,'>' ,0)->pluck('id')->toArray();

        foreach ((range(1, 10)) as $index)
        {
            DB::table('meal_tag')->insert(
                [
                    'tag_id' => $tagIds[array_rand($tagIds)],
                    'meal_id' => $mealIds[array_rand($mealIds)]
                ]
            );
        }
    }
}
