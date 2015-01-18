<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 03:28
 */

class TasksTableSeeder extends Seeder {
    public function run() {
        $date = new DateTime();
        DB::table('tasks')->insert(array(
            array('id' => 1,
                'user_id' => 1,
                'description' => "Do sth.",
                'start_date' => $date->sub(new DateInterval('P1D')),
                'deadline' => $date->add(new DateInterval('P3D')),
                'feedback' => "FIX IT!",
                'difficulty' => 5,
                'time_estimation' => 4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array('id' => 2,
                'user_id' => 1,
                'description' => "Do sth. else",
                'start_date' => $date->sub(new DateInterval('P1D')),
                'deadline' => $date->add(new DateInterval('P3D')),
                'feedback' => "OK",
                'difficulty' => 8,
                'time_estimation' => 12,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),
            array('id' => 3,
                'user_id' => 2,
                'description' => "Do nothing",
                'start_date' => $date->sub(new DateInterval('P1D')),
                'deadline' => $date->add(new DateInterval('P3D')),
                'feedback' => null,
                'difficulty' => 1,
                'time_estimation' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ),

        ));
    }
}
