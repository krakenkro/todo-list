<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use PhpParser\Node\Expr\Cast\Object_;

class TaskSeeder extends Seeder
{
    public function run()
    {
        DB::table('tasks')->insert([
            'name' => 'Уборка',
            'description' => 'Помыть пол',
        ]);

        DB::table('tasks')->insert([
            'name' => 'Учеба',
            'description' => 'Сделать дз по математике',
        ]);
    }
}
