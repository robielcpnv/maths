<?php

namespace Database\Seeders;

use App\Models\Operation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operation::insert(
            [
                ['name' => '+', 'slug' => 'ADD'],
                ['name' => '-', 'slug' => 'SUB'],
                ['name' => '*', 'slug' => 'MUL'],
                ['name' => '/', 'slug' => 'DIV'],
            ]
        );
    }
}
