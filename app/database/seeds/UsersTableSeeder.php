<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 03:28
 */

class UsersTableSeeder extends Seeder {
    public function run() {
        DB::table('users')->insert(array(
            array('id' => 1, 'name' => "Adam", 'surname' => "Smith", 'password' => "48932urjk32h7y",
                'remember_token' => "blah, blah", "group_id" => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()),
            array('id' => 2, 'name' => "Stevie", 'surname' => "Griffin", 'password' => "rnkj23hi2y4i2u3n",
                'remember_token' => 'Day, when world be mine', 'group_id' => 1, 'created_at' => new DateTime(), 'updated_at' => new DateTime()),
            array('id' => 3, 'name' => "Adam", 'surname' => "Małysz", 'password' => "9f09fes9jes98",
                'remember_token' => 'Skocznia', 'group_id' => 2, 'created_at' => new DateTime(), 'updated_at' => new DateTime()),
        ));
    }
}