<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 05:47
 */

class Position extends Eloquent {
    public $timestamps = false;
    public function users() {
        return $this->hasMany('User');
    }
    public function getIdOfPosition($positionName) {
        return Position::where('name', '=', $positionName)->first()->id;
    }
}