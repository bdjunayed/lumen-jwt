<?php

use App\User;
use Illuminate\Database\Seeder;

Class UsersTableSeeder extends Seeder {


    public function run() {
        factory(User::class, 10)->create();
    }
}
