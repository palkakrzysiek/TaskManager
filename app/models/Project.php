<?php

class Project extends Eloquent {

    protected $table = 'projects';

    protected $fillable = array('name', 'startDate', 'deadline');

    public function tasks()
    {
        return $this->hasMany('Task');
    }

}