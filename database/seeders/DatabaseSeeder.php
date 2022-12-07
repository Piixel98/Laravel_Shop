<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $user1 = new User([
            'name'=>'admin',
            'email'=>'admin@uoc.edu',
            'password'=>Hash::make('1234'),
            'role'=>'admin',
            'status'=>'active'
        ]);
        $user1->save();
        $user2 = new User([
            'name'=>'user',
            'email'=>Hash::make('1234'),
            'password'=>'1122',
            'role'=>'user',
            'status'=>'active'
        ]);
        $user2->save();
        $this->call(OrderSeeder::class);
    }
}
