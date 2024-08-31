<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Todos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Todo::create(['user_id' => 1, 'title' => 'End some project', 'status' => 0]);
        Todo::create(['user_id' => 1, 'title' => 'Eat some food', 'status' => 0]);
        Todo::create(['user_id' => 1, 'title' => 'Other actions', 'status' => 0]);
    }
}
