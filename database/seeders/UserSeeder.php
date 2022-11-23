<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
          'name' => 'Dhivin Kumar A',
          'email' => '927621bit026@mkce.ac.in',
          'password' => '$2y$10$E6s1p81xElt9NAarFPL4N.4VJXZ8nTmMyqB8C4UFJ2y86yQM9ePmu',
        ],
        [
          'name' => 'Gowtham G',
          'email' => '927621bit031@mkce.ac.in',
          'password' => '$2y$10$E6s1p81xElt9NAarFPL4N.4VJXZ8nTmMyqB8C4UFJ2y86yQM9ePmu',
        ],
        [
          'name' => 'Iniyan B',
          'email' => '927621bit036@mkce.ac.in',
          'password' => '$2y$10$E6s1p81xElt9NAarFPL4N.4VJXZ8nTmMyqB8C4UFJ2y86yQM9ePmu',
        ],
        [
          'name' => 'Kavi Kumaran R',
          'email' => '927621bit044@mkce.ac.in',
          'password' => '$2y$10$E6s1p81xElt9NAarFPL4N.4VJXZ8nTmMyqB8C4UFJ2y86yQM9ePmu',
        ]
      ];
      foreach ($users as $user) {
        User::create($user);
      }
    }
}
