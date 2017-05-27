<?php namespace App\Repositories;

use App\User;
use App\Role;
use App\Helpers\EloquentHelper;
use DB;

class UserRepo
{
	public function getBy($params = array())
	{
		$query = DB::table('users');

        $query->select(array(
            'users.*',
        ));

        $EloquentHelper = new EloquentHelper();
        return $EloquentHelper->allInOne($query, $params);
	}

	public function find($id)
	{
		return User::find($id);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		$user = new User;
		$user->name  = $data['name'];
		$user->email  = $data['email'];
		$user->password  = bcrypt($data['password']);
		$user->save();

		foreach($data['role_id'] as $role_id){
           $user->roles()->attach($role_id);
		}

		return $user;
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function update(array $data,$id)
	{
		$user = User::find($id);

		$user->name  = $data['name'];
		$user->email  = $data['email'];

		if(!empty($data['password'])){
			$user->password  = bcrypt($data['password']);
		}
		$user->save();

		//delete all selected role first
		DB::table('role_user')->where('user_id',$id)->delete();

		//then add new roles to user
		foreach($data['role_id'] as $role_id){
           $user->roles()->attach($role_id);
		}

		return $user;
	}


	public function delete(int $id)
	{
		return User::destroy($id);
	}

	public function currentUserRole($user_id='')
	{
		$data = DB::table('role_user')->select('role_id')->where('user_id',$user_id)->get();

		$o = array();
		foreach ($data as $key => $value) {
			$o[$value->role_id]=$value->role_id;
		}
		return $o;
	}
}