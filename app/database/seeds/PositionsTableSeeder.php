<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 03:28
 */

class PositionsTableSeeder extends Seeder {
    public function run() {
        DB::table('positions')->insert(array(
            array('id' => 1, 'name' => 'ceo',),
            array('id' => 2, 'name' => 'project_manager',),
            array('id' => 3, 'name' => 'department_manager',),
            array('id' => 4, 'name' => 'group_leader',),
            array('id' => 5, 'name' => 'forum_moderator',),
            array('id' => 6, 'name' => 'board_member',),
            array('id' => 7, 'name' => 'employee',),
        ));
    }
}