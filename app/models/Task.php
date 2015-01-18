<?php

class Task extends Eloquent {

    protected $table = 'tasks';

    protected $fillable = array('description', 'startDate', 'deadline',
                                'feedback', 'difficulty', 'timeEstimation');

    public function user()
    {
        return $this->hasOne('User');
    }

}