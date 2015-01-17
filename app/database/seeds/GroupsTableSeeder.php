<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 03:28
 */

class GroupsTableSeeder extends Seeder {
    public function run() {
        DB::table('groups')->insert(array(
            array('id' => 1, 'name' => "Frontend"),
            array('id'=>2, 'name'=>"Backend"),
            array('id'=>3, 'name'=>"Calendar"),
            array('id'=>4, 'name'=>"Dashboard"),
        ));
    }
}