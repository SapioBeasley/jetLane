<?php

use Illuminate\Database\Seeder;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class UserTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$users = [
			[
				'name' => 'Andreas Admin',
				'email' => 'andreas@sapioweb.com',
				'password' => bcrypt('2wsxzaq1'),
				'role' => '1'
			],
			[
				'name' => 'Andreas Agent' . rand(1, 100),
				'email' => 'andreas2@sapioweb.com',
				'password' => bcrypt('2wsxzaq1'),
				'role' => '2'
			],
			[
				'name' => 'Andreas Lender' . rand(1, 100),
				'email' => 'andreas3@sapioweb.com',
				'password' => bcrypt('2wsxzaq1'),
				'role' => '3'
			],
		];

		foreach ($users as $user) {

			$role = $user['role'];

			$user = CrudHelper::store(new App\User, [
				'name' => $user['name'],
				'email' => $user['email'],
				'password' => $user['password']
			]);

			$user = CrudHelper::show(new App\User, 'id', $user['id']);

			$user->roles()->sync([$role]);
		}
	}
}
