<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          // Real users
          $teacher = Role::where('slug', 'TCR')->firstOrFail();
          $student = Role::where('slug', 'STU')->firstOrFail();
          foreach (
              [
                  ['lname' => 'TESFAZGHI', 'fname' => 'Robiel', 'role' => $teacher,'email' => 'robboytm@gmail.com'],
                  ['lname' => 'TESFAZGHI', 'fname' => 'Kokob', 'role' => $teacher ,'email' => 'kokobtes@gmail.com'],
                  ['lname' => 'TESFAZGHI', 'fname' => 'Naël', 'role' => $student,'email' => 'naeltes@gmail.com'],
                  
              ]
              as $user) {
              User::create([
                  'role_id' => $user['role']->id,
                  'name' => ucfirst(strtolower($user['fname']))  . " " .  ucfirst(strtolower($user['lname'])),
                  'email' => $user['email'],
                  'password' => Hash::make('12345678'),
              ]);
          }
  
    }
}
