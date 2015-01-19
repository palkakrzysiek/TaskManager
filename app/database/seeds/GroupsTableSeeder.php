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
            array('id' => 1, 'name' => "Frontend", 'company_id' => 2),
            array('id'=>2, 'name'=>"Backend", 'company_id' => 2),
            array('id'=>3, 'name'=>"Calendar", 'company_id' => 2),
            array('id'=>4, 'name'=>"Dashboard", 'company_id' => 2),
            array('id'=>5, 'name'=>"QA", 'company_id' => 1),
        ));
    }
}