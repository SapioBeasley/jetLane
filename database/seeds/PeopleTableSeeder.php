<?php

use Illuminate\Database\Seeder;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class PeopleTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$peopleMake = [
			'5',
			'4',
			'3',
			'2',
			'1',
		];

		foreach ($peopleMake as $go) {
			$people = CrudHelper::store(new \App\PeopleContact, [
				'first_name' => 'IamPerson ' . str_random('10'),
				'middle_name' => 'MyMiddle ' . str_random('10'),
				'last_name' => 'MyLast ' . str_random('10'),
				'birthday_day' => date('d'),
				'birthday_month' => date('m'),
				'birthday_year' => date('Y'),
				'gender' => 'm',
				'address_street' => '123 ' . str_random('7') . ' street',
				'address_city' => str_random('10'),
				'address_state' => str_random('10'),
				'address_zip' => rand('11111', '99999'),
				'country' => str_random('10'),
				'home_phone' => rand('1111111111', '9999999999'),
				'business_phone' => rand('1111111111', '9999999999'),
				'mobile_phone' => rand('1111111111', '9999999999'),
				'other_phone' => rand('1111111111', '9999999999'),
				'fax' => rand('1111111111', '9999999999'),
				'email_1' => 'andreas+' . str_random('10') . '@sapioweb.com',
				'email_2' => 'andreas+' . str_random('10') . '@sapioweb.com',
				'email_3' => 'andreas+' . str_random('10') . '@sapioweb.com',
				'avatar' => 'https://source.unsplash.com/category/buildings/?nature=' . rand('1', '90'),
				'tax_id' => rand('1111111111', '9999999999')
			]);

			$people = CrudHelper::show(new \App\PeopleContact, 'id', $people['id']);

			$userId = (string) rand(1,3);

			$people->createdBy()->sync([$userId]);
		}
	}
}
