<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 03:28
 */

class CompaniesTableSeeder extends Seeder {
    public function run() {
        DB::table('companies')->insert(array(
            array('id' => 1, 'name' => "Fabryka zupek chińskich"),
            array('id'=>2, 'name'=>"Dev Studio"),
        ));
    }
}