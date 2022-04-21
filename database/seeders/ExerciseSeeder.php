<?php

namespace Database\Seeders;

use App\Models\Exercise;
use App\Models\Operation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i = 0; $i < 5; $i++) {
            $operator = Operation::all()->random();
            $min = rand(1, 20);
            $max = rand(20, 50);

            Exercise::create([
                'name' => $operator->name ." ".$operator->slug,
                'description' => $operator->name ." ".$operator->slug." ".$min." ".$max,
                'quantity' => rand(5,20),
                'firstMin' => $min,
                'firstMax' => $max,
                'secondMin' => $min,
                'secondMax' => $max,
                'operation_id' => $operator->id,
            ]);
        }

    }
}
