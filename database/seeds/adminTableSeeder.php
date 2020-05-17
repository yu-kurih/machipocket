<?php

use Illuminate\Database\Seeder;

class adminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        [
            'name' => 'admin',
            'email'=> 'test@gmail.com',
            'password'=> 'adminpassword',        
        ]]);
    }
}
