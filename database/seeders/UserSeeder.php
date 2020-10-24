<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /*   \DB::table('users')->insert(array(
            array('id' => '1','name' => 'Hermann Berkhoff','email' => 'hermann@berkhoff.cl','email_verified_at' => NULL,'password' => '$2y$10$Mvl6633IpaKyDqbVeGSXKO1AKFv1qddsqdOH3w8qG6H704349kAIC','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => NULL,'current_team_id' => '1','profile_photo_path' => NULL,'created_at' => '2020-09-28 12:59:34','updated_at' => '2020-09-28 13:11:28'),
            array('id' => '2','name' => 'Susana Sandoval','email' => 'susana@sandoval.cl','email_verified_at' => NULL,'password' => '$2y$10$gN9vXt8E0ednQUyZZK/JgukwqnIiZdEdgAVbsxv1RTPsXbeBye4aG','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => NULL,'current_team_id' => '2','profile_photo_path' => NULL,'created_at' => '2020-10-06 13:44:59','updated_at' => '2020-10-06 13:45:00'),
            array('id' => '3','name' => 'Ana Barria','email' => 'ana@barria.com','email_verified_at' => NULL,'password' => '$2y$10$H6xT81WWxbzEElnZurUYtuCyQ9iQijlNkWsc6Orhc8BO3vtP8oyeS','two_factor_secret' => NULL,'two_factor_recovery_codes' => NULL,'remember_token' => NULL,'current_team_id' => '3','profile_photo_path' => NULL,'created_at' => '2020-10-06 13:50:31','updated_at' => '2020-10-06 13:50:32')
        ));*/

        User::factory()->count(200)->create();
    }
}
