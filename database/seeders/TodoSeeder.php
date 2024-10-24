<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    public function run()
    {
        Todo::create(['title' => 'Complete Laravel Project']);
        Todo::create(['title' => 'Buy groceries']);
        Todo::create(['title' => 'Schedule a meeting']);
    }
}
