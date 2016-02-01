<?php

use Illuminate\Database\Seeder;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;

class CompanyCategoriesSeeder extends Seeder
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
				'category' => 'Appraiser',
				'description' => 'A company that performs appraisals'
			],
			[
				'category' => 'Brokerage',
				'description' => 'A licensed real estate brokerage'
			],
			[
				'category' => 'Contractor',
				'description' => 'A company that performs work on specific houses'
			],
			[
				'category' => 'Employer',
				'description' => 'A company that employs Leads, Clients, or Prospects'
			],
			[
				'category' => 'Home Inspection',
				'description' => 'A company that performs home inspections'
			],
			[
				'category' => 'Insurance Company',
				'description' => 'A company that provides insurance'
			],
			[
				'category' => 'Investor',
				'description' => 'A company that invests in real property'
			],
			[
				'category' => 'Lender',
				'description' => 'A company that loans money on real property'
			],
			[
				'category' => 'Other',
				'description' => 'A company that does not fit any other category'
			],
			[
				'category' => 'Title Company	',
				'description' => 'A company that provides title and escrow services'
			],
			[
				'category' => 'Vendor',
				'description' => 'A company that provides services to the Principal'
			],
		];

		foreach ($categoryData as $category) {
			$peopleCategory = CrudHelper::store(new \App\CompanyCategory, $category);
		}
	}
}
