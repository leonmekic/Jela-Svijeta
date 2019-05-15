<?php

use Illuminate\Database\Seeder;

class DescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));
        foreach (\App\Models\Meal::all() as $index) {
            static $order = 1;
            DB::table('descriptions')->insert(
                [
                    'description' => $faker->sentence(),
                ]
            );
        }
    }
}
