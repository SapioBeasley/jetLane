<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class ContactsControllerAsAgentTest extends TestCase
{
	/**
	 * Acting as admin user we set up our tests
	 */
	public function setUp()
	{
		parent::setUp();
		$this->user = User::find(2);
		$this->contactsController = new App\Http\Controllers\ContactsController;
	}

	public function testCompanyIndex()
	{
		$this->actingAs($this->user);

		$contacts = $this->contactsController->indexCompany()->getData();
		$contacts = $contacts['contacts'];

		$this->assertTrue(isset($contacts['shared']));
		$this->assertTrue(isset($contacts['private']));

		$sharedContacts = $contacts['shared'];
		$privateContacts = $contacts['private'];

		// As admin all contacts are shared with him regardless of creator
		$this->assertEmpty($privateContacts);
	}

	public function testPeopleIndex()
	{
		$this->actingAs($this->user);

		$contacts = $this->contactsController->indexPeople()->getData();
		$contacts = $contacts['contacts'];

		$this->assertTrue(isset($contacts['shared']));
		$this->assertTrue(isset($contacts['private']));

		$sharedContacts = $contacts['shared'];
		$privateContacts = $contacts['private'];

		$this->assertEmpty($privateContacts);
	}

	public function testCreatedByIdToEmail()
	{
		// Feed contacts into test as $contacts
		// dd($contactsController->createdByIdToEmail());
	}

	public function testShowCompany()
	{
		// Feed company $id
		// dd($contactsController->showCompany());
	}

	public function testShowPeople()
	{
		// Feed people $id
		// dd($contactsController->showPeople());
	}

	public function testCreateCompany()
	{
		// dd($contactsController->createCompany());
	}

	public function testCreatePeople()
	{
		// dd($contactsController->createPeople());
	}

	public function testStoreCompany()
	{
		// dd($contactsController->storeCompany());
	}

	public function testStorePeople()
	{
		// dd($contactsController->storePeople());
	}

	public function testEditCompany()
	{
		// Provide $id
		// dd($contactsController->editCompany());
	}

	public function testEditPeople()
	{
		// Provide $id
		// dd($contactsController->editPeople());
	}

	public function testEditContactComplete()
	{
		// Provide $model, $catModel, $id, $with
		// dd($contactsController->editContactComplete());
	}

	public function testUnsetCanView()
	{
		// Provide $canViews
		// dd($contactsController->unsetCanView());
	}

	public function testUnsetSelectedCategory()
	{
		// Provide $model, $selectedCategories
		// dd($contactsController->unsetSelectedCategory());
	}

	public function testDeleteCompany()
	{
		// Provide $id
		// dd($contactsController->deleteCompany());
	}

	public function testDeletePeople()
	{
		// Provide $id
		// dd($contactsController->deletePeople());
	}

	public function testDestroyContact()
	{
		// Provide $model, $id
		// dd($contactsController->destroyContact());
	}

	public function testUpdateCompany()
	{
		// Provide $id
		// dd($contactsController->updateCompany());
	}

	public function testUpdatePeople()
	{
		// Provide $id
		// dd($contactsController->updatePeople());
	}

	public function testUpdateCategories()
	{
		// Provide $catModel, $data
		// dd($contactsController->updateCategories());
	}

	public function testCompaniesSelect()
	{
		// dd($contactsController->companiesSelect());
	}

	public function testGetCategories()
	{
		// Provide $model
		// dd($contactsController->getCategories());
	}

	public function testStoreContactComplete()
	{
		// Provide $model, $catModel, $data
		// dd($contactsController->storeContactComplete());
	}

	public function testGetUsersRole()
	{
		// Provide $userId
		// dd($contactsController->getUsersRole());
	}

	public function testAvatarUpload()
	{
		//  Provide $upload
		// dd($contactsController->avatarUpload());
	}

	public function testGetAll()
	{
		// Provide $model
		// dd($contactsController->getAll());
	}

	public function testGetContactsByRole()
	{
		// Provide $model
		// dd($contactsController->getContactsByRole());
	}

	public function testShowContact()
	{
		// Provide $model, $contactId, $relationships = []
		// dd($contactsController->showContact());
	}

	public function testCanView()
	{
		// Provide $createdContact, $canView
		// dd($contactsController->canView());
	}

	public function testGetAllUsers()
	{
		// dd($contactsController->getAllUsers());
	}

	public function testCreateContact()
	{
		// Provide $model, $data
		// dd($contactsController->createContact());
	}
}
