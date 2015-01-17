<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 02:23
 */

class Breed extends Eloquent{
    public $timestamps = false;
    public function cats() {
        return $this->hasMany('Cat');
    }
}