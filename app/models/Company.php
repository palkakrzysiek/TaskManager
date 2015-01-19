<?php
/**
 * Created by PhpStorm.
 * User: Krzysiek
 * Date: 2014-12-17
 * Time: 05:47
 */

class Company extends Eloquent {
    public $timestamps = false;

    public function groups() {
        return $this->hasMany('Group');
    }

    public function users() {
        return $this->hasManyThrough('User', 'Group');
    }

    public function getUsers() {
        return DB::table('users')
            ->join('groups', 'users.group_id', '=', 'groups.id')
            ->join('companies', 'groups.company_id', '=', 'companies.id')
            ->select('users.id', 'companies.id')
            ->where('companies.id', '=', $this->id)->get();
    }
}