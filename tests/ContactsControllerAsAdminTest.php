<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ContactsControllerAsAdminTest extends TestCase
{
	/**
	 * Acting as admin user we set up our tests
	 */
	public function setUp()
	{
		parent::setUp();

		$this->contactsController = new App\Http\Controllers\ContactsController;

		$this->user = User::find(1);
		$this->actingAs($this->user);

		$this->request = new Request;
	}

	public function testCompanyIndex()
	{
		$contacts = $this->contactsController->indexCompany()->getData();
		$contacts = $contacts['contacts'];

		$this->assertTrue(isset($contacts['shared']));
		$this->assertTrue(isset($contacts['private']));

		$sharedContacts = $contacts['shared'];
		$privateContacts = $contacts['private'];

		// As admin all contacts are shared with him regardless of creator
		$this->assertEmpty($privateContacts);

		return $contacts;
	}

	public function testPeopleIndex()
	{
		$contacts = $this->contactsController->indexPeople()->getData();
		$contacts = $contacts['contacts'];

		$this->assertTrue(isset($contacts['shared']));
		$this->assertTrue(isset($contacts['private']));

		$sharedContacts = $contacts['shared'];
		$privateContacts = $contacts['private'];

		$this->assertEmpty($privateContacts);

		return $contacts;
	}

	public function testCreatedByIdToEmailCompany()
	{
		$contactsOriginal = App\CompanyContact::find(1);

		$this->assertTrue(is_numeric($contactsOriginal['created_by']));

		$contacts = App\CompanyContact::all();

		$contactsNew = $this->contactsController->createdByIdToEmail($contacts);

		$this->assertTrue(! empty($contactsNew[0]));

		$this->assertTrue(is_string($contactsNew[0]['created_by']));
	}

	public function testCreatedByIdToEmailPeople()
	{
		$contactsOriginal = App\PeopleContact::find(1);

		$this->assertTrue(is_numeric($contactsOriginal['created_by']));

		$contacts = App\PeopleContact::all();

		$contactsNew = $this->contactsController->createdByIdToEmail($contacts);

		$this->assertTrue(! empty($contactsNew[0]));

		$this->assertTrue(is_string($contactsNew[0]['created_by']));
	}

	public function testStoreCompany()
	{
		$request = new Illuminate\Http\Request;

		$createData = [
			'name' => 'PHPUNIT Company ' . str_random(10),
			'dba' => 'Some Test DBA' . str_random(10),
			'organization' => 'Some Test Org ' . str_random(10),
			'address_street' => rand(123, 9999) . ' Random St',
			'address_city' => 'some city',
			'address_state' => 'some state',
			'address_zip' => rand(00000, 99999),
			'country' => str_random(2),
			'phone' => rand(3333333333, 9999999999),
			'mobile_phone' => rand(3333333333, 9999999999),
			'other_phone' => rand(3333333333, 9999999999),
			'fax' => rand(3333333333, 9999999999),
			'email_1' => str_random(10) . '@sapioweb.com',
			'email_2' => str_random(10) . '@sapioweb.com',
			'email_3' => str_random(10) . '@sapioweb.com',
			'website' => str_random(10) . '.com',
			'notes' => 'nothing speacial but I will say this...' . str_random(30) . ' lol',
			'created_by' => $this->user['id'],
		];

		foreach ($createData as $createKey => $createValue) {
			$request[$createKey] = $createValue;
		}

		$createdCompany = $this->contactsController->storeCompany($request);

		$this->assertEquals($createdCompany->getStatusCode(), 302);

		$this->assertEquals($createdCompany->getSession()->get('success_message'), 'Conact Successfully created...');
	}

	public function testStorePeople()
	{
		$request = new Illuminate\Http\Request;

		$createData = [
			'first_name' => 'PHPUNIT First ' . str_random(10),
			'middle_name' => 'Middle ' . str_random(10),
			'last_name' => 'Last ' . str_random(10),
			'birthday_day' => rand(1,30),
			'birthday_month' => rand(1,12),
			'birthday_year' => rand(1980, 2016),
			'gender' => 'm',
			'address_street' => rand(123, 9999) . ' Random St',
			'address_city' => 'some city',
			'address_state' => 'some state',
			'address_zip' => rand(00000, 99999),
			'country' => str_random(2),
			'home_phone' => rand(3333333333, 9999999999),
			'business_phone' => rand(3333333333, 9999999999),
			'mobile_phone' => rand(3333333333, 9999999999),
			'other_phone' => rand(3333333333, 9999999999),
			'fax' => rand(3333333333, 9999999999),
			'email_1' => str_random(10) . '@sapioweb.com',
			'email_2' => str_random(10) . '@sapioweb.com',
			'email_3' => str_random(10) . '@sapioweb.com',
			'avatar' => NULL,
			'tax_id' => rand(0000000000,9999999999),
			'created_by' => $this->user['id'],
		];

		foreach ($createData as $createKey => $createValue) {
			$request[$createKey] = $createValue;
		}

		$createdPerson = $this->contactsController->storePeople($request);

		$this->assertEquals($createdPerson->getStatusCode(), 302);

		$this->assertEquals($createdPerson->getSession()->get('success_message'), 'Conact Successfully created...');
	}

	public function testShowCompany()
	{
		$contact = \App\CompanyContact::where('name', 'LIKE', 'PHPUNIT%')->take(1)->first();

		$contact = $this->contactsController->showCompany($contact->id);

		$contactData = $contact->getData()['contact']->toArray();

		$this->assertTrue(isset($contactData['id']));
		$this->assertTrue(isset($contactData['name']));
		$this->assertTrue(isset($contactData['dba']));
		$this->assertTrue(isset($contactData['website']));
	}

	public function testShowPeople()
	{
		$contact = \App\PeopleContact::where('first_name', 'LIKE', 'PHPUNIT%')->take(1)->first();

		$contact = $this->contactsController->showPeople($contact->id);

		$contactData = $contact->getData()['contact']->toArray();

		$this->assertTrue(isset($contactData['id']));
		$this->assertTrue(isset($contactData['first_name']));
		$this->assertTrue(isset($contactData['last_name']));
		$this->assertTrue(isset($contactData['email_1']));
	}

	public function testCreateCompany()
	{
		// $contact = $this->contactsController->createCompany();

		// $data = $contact->getData();
		// dd($data);
	}

	public function testCreatePeople()
	{
		// dd($this->contactsController->createPeople());
	}

	public function testEditCompany()
	{
		// Provide $id
		// dd($this->contactsController->editCompany());
	}

	public function testEditPeople()
	{
		// Provide $id
		// dd($this->contactsController->editPeople());
	}

	public function testEditContactComplete()
	{
		// Provide $model, $catModel, $id, $with
		// dd($this->contactsController->editContactComplete());
	}

	public function testUnsetCanView()
	{
		// Provide $canViews
		// dd($this->contactsController->unsetCanView());
	}

	public function testUnsetSelectedCategory()
	{
		// Provide $model, $selectedCategories
		// dd($this->contactsController->unsetSelectedCategory());
	}

	public function testDeleteCompany()
	{
		// Provide $id
		// dd($this->contactsController->deleteCompany());
	}

	public function testDeletePeople()
	{
		// Provide $id
		// dd($this->contactsController->deletePeople());
	}

	public function testDestroyContact()
	{
		// Provide $model, $id
		// dd($this->contactsController->destroyContact());
	}

	public function testUpdateCompany()
	{
		// Provide $id
		// dd($this->contactsController->updateCompany());
	}

	public function testUpdatePeople()
	{
		// Provide $id
		// dd($this->contactsController->updatePeople());
	}

	public function testUpdateCategories()
	{
		// Provide $catModel, $data
		// dd($this->contactsController->updateCategories());
	}

	public function testCompaniesSelect()
	{
		$companiesSelect = $this->contactsController->companiesSelect();

		$this->assertEquals($companiesSelect[0], 'Select Company');
	}

	public function testGetCompanyCategories()
	{
		$model = new \App\CompanyCategory;

		$categories = $this->contactsController->getCategories($model);

		$categories = $categories->toArray();

		foreach ($categories as $category) {
			$this->assertTrue(isset($category['id']));
			$this->assertTrue(isset($category['category']));
			$this->assertTrue(isset($category['description']));
		}
	}

	public function testGetPeopleCategories()
	{
		$model = new \App\PeopleCategory;

		$categories = $this->contactsController->getCategories($model);

		$categories = $categories->toArray();

		foreach ($categories as $category) {
			$this->assertTrue(isset($category['id']));
			$this->assertTrue(isset($category['category']));
			$this->assertTrue(isset($category['description']));
		}
	}

	public function testStoreContactComplete()
	{
		// Provide $model, $catModel, $data
		// dd($this->contactsController->storeContactComplete());
	}

	public function testGetUsersRole()
	{
		// Provide $userId
		// dd($this->contactsController->getUsersRole());
	}

	public function testAvatarUpload()
	{
		//  Provide $upload
		// dd($this->contactsController->avatarUpload());
	}

	public function testGetAll()
	{
		// Provide $model
		// dd($this->contactsController->getAll());
	}

	public function testGetContactsByRole()
	{
		// Provide $model
		// dd($this->contactsController->getContactsByRole());
	}

	public function testShowContact()
	{
		// Provide $model, $contactId, $relationships = []
		// dd($this->contactsController->showContact());
	}

	public function testCanView()
	{
		// Provide $createdContact, $canView
		// dd($this->contactsController->canView());
	}

	public function testGetAllUsers()
	{
		// dd($this->contactsController->getAllUsers());
	}

	public function testCreateContact()
	{
		// Provide $model, $data
		// dd($this->contactsController->createContact());
	}

	public function testPeopleIndexFilter()
	{
	}

	public function testCompanyIndexFilter()
	{
	}
}
