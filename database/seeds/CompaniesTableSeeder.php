<?php

use Illuminate\Database\Seeder;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class CompaniesTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$companyMake = [
			'5',
			'4',
			'3',
			'2',
			'1',
		];

		foreach ($companyMake as $go) {
			$company = CrudHelper::store(new \App\Company, [
				'name' => 'IamCompany ' . str_random('10'),
				'dba' => 'Company ' . str_random('10'),
				'organization' => 'Organization ' . str_random('10'),
				'address_street' => '123 ' . str_random('7') . ' street',
				'address_city' => str_random('10'),
				'address_state' => str_random('10'),
				'address_zip' => rand('11111', '99999'),
				'country' => str_random('10'),
				'phone' => rand('1111111111', '9999999999'),
				'mobile_phone' => rand('1111111111', '9999999999'),
				'other_phone' => rand('1111111111', '9999999999'),
				'fax' => rand('1111111111', '9999999999'),
				'email_1' => 'andreas+' . str_random('10') . '@sapioweb.com',
				'email_2' => 'andreas+' . str_random('10') . '@sapioweb.com',
				'email_3' => 'andreas+' . str_random('10') . '@sapioweb.com',
				'website' => str_random('10') . '.com',
			]);
		}
	}
}
