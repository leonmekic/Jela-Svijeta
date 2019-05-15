<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(MealTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(IngredientsTableSeeder::class);
        $this->call(IngredientMealTableSeeder::class);
        $this->call(MealTagTableSeeder::class);
        $this->call(germanCatTagIngMeal::class);
        $this->call(italianCatTagIngMeal::class);
        $this->call(DescriptionTableSeeder::class);
        $this->call(DescriptionTranslationTableSeeder::class);
    }
}
