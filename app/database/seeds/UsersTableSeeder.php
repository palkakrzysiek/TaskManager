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
            array('id' => 1,
                'email' => 'jsmith@company.com',
                'name' => "John",
                'surname' => "Smith",
                'password' => Hash::make('dupa.8'),
                'remember_token' => "blah, blah",
                'specialities' => "management, hibernate, spring, gradle, jenkins, solr",
                'group_id' => 1,
                'position_id' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()),
            array('id' => 2,
                'email' => 'sgriffin@company.com',
                'name' => "Stevie",
                'surname' => "Griffin",
                'password' => Hash::make('K1llLois'),
                'remember_token' => 'Day, when the world be mine',
                'specialities' => "html, js, css, jquery, angular",
                'group_id' => 1,
                'position_id' => 2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()),
            array('id' => 3,
                'email' => 'amalysz@company.com',
                'name' => "Adam",
                'surname' => "Małysz",
                'password' => Hash::make('Oddac2=skoki'),
                'remember_token' => 'Technika',
                'specialities' => "ski jumping, dakar",
                'group_id' => 2,
                'position_id' => 6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()),
        ));
    }
}