<?php

use Illuminate\Database\Seeder;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class PeopleCategoriesSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		$categoryData = [
			[
				'category' => 'agent',
				'description' => 'A person who is a licensed real estate agent'
			],
			[
				'category' => 'assistant',
				'description' => 'A person who is an assistant to someone else'
			],
			[
				'category' => 'broker',
				'description' => 'A person who is a licensed real estate broker'
			],
			[
				'category' => 'client',
				'description' => 'A person for whom we are working on a transaction'
			],
			[
				'category' => 'contractor',
				'description' => 'A person who performs work on houses or for the client'
			],
			[
				'category' => 'lead',
				'description' => 'A person for whom we are not yet working on a transaction'
			],
			[
				'category' => 'lender',
				'description' => 'A person who works for a mortgage company'
			],
			[
				'category' => 'other',
				'description' => 'A person who does not fit into any of the other categories'
			],
			[
				'category' => 'principal',
				'description' => 'The person who is the owner of the Jetlane software'
			],
			[
				'category' => 'prospect',
				'description' => ''
			],
			[
				'category' => 'title agent',
				'description' => 'A person who works for a title company'
			],
			[
				'category' => 'vendor',
				'description' => 'A person who provides services to the Principal'
			],
		];

		foreach ($categoryData as $category) {
			$peopleCategory = CrudHelper::store(new \App\PeopleCategory, $category);
		}
	}
}
