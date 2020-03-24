<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for ($i = 0; $i < 20; $i++) 
            DB::table('users')->insert([
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ]);

        for ($i = 0; $i < 10; $i++) 
            DB::table('tasks')->insert([
                'title' => Str::random(10),
                'body' => Str::random(30),
                'status' => 'in_process',
                'deadline' => '30.03.2020'
            ]);

        for ($i = 0; $i < 10; $i++) 
            DB::table('tasks')->insert([
                'title' => Str::random(10),
                'body' => null,
                'status' => 'in_process',
                'deadline' => '30.03.2020'
            ]);
        for ($i = 0; $i < 10; $i++) 
            DB::table('user_task')->insert([
                'user_id' => $i + 1,//rand(1, 19),
                'task_id' => rand(1, 19)
            ]);
        
        for ($i = 0; $i < 10; $i++) 
            DB::table('task_user')->insert([
                'user_id' => rand(1, 19),
                'task_id' => rand(1, 19)
            ]);
    }
}
