<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 02:19
 */

class Cat extends Eloquent {
    protected $fillable = array('name', 'date_of_birth', 'breed_id');
    public function breed() {
        return $this->belongsTo('Breed');
    }
}