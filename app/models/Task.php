<?php

class Project extends Eloquent {

    protected $table = 'tasks';

    protected $fillable = array('description', 'startDate', 'deadline',
                                'feedback', 'difficulty', 'timeEstimation');

    public function group()
    {
        return $this->hasOne('group');
    }

}