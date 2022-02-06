<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name'=>'director',
                'email'=>'director@gmaul.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make('muhammad'),
                'remember_token'=>null,
                'role'=>'director'
            ],
            [
                'name'=>'admin',
                'email'=>'admin@gmaul.com',
                'email_verified_at'=>now(),
                'password'=>Hash::make('muhammad'),
                'remember_token'=>null,
                'role'=>'admin'
            ]
            ];
        DB::table('users')->insert($users);
    }
}