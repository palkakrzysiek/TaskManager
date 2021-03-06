<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	protected $fillable = array('password', 'name', 'surname', 'position_id', 'group_id', 'specialities');

	public function getAuthIdentifier() {
		return $this->getKey();
	}
	public function getAuthPassword() {
		return $this->password;
	}

	public function group() {
        return $this->belongsTo('Group');
    }

	public function tasks() {
		return $this->hasMany('Task');
	}

	public function position() {
		return $this->hasOne('Position');
	}

	public function responsibleForTask(Task $task) {
		return $this->id == $task->owner;
	}

	public function getCompanyId() {
		return DB::table('users')
			->join('groups', 'users.group_id', '=', 'groups.id')
			->join('companies', 'groups.company_id', '=', 'companies.id')
			->select('companies.id')
			->where('users.id', '=', $this->id)->get()[0]->id;
	}
	public function getCompanyName() {
		return DB::table('users')
			->join('groups', 'users.group_id', '=', 'groups.id')
			->join('companies', 'groups.company_id', '=', 'companies.id')
			->select('companies.name')
			->where('users.id', '=', $this->id)->get()[0]->name;
	}

	public function getPositionName() {
		return Position::find($this->position_id)->name;
	}

	public function getPositionFriendlyName() {
		return strtoupper(str_replace('_', ' ', $this->getPositionName()));
	}

	public function canEditTask(Task $task) {
		return $this->getPositionName() == 'ceo' or $this->owns($task);
	}

	public function canEditProfile(User $targetUser) {
		return $this->id == $targetUser->id or $this->getPositionName() == 'ceo';
	}

	public function canChangeProfilePass(User $targetUser) {
		return $this->id == $targetUser->id;
	}

	public function canAddProfile() {
		$position = Position::find($this->position_id)->name;
		return $position == 'ceo';
	}
}
