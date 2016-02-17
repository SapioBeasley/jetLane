<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sapioweb\CrudHelper\CrudyController as CrudHelper;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PeopleContact;
use App\CompanyContact;

class ContactsController extends Controller
{
	protected $role;

	/**
	* Create a new controller instance.
	* @return void
	*/
	public function __construct()
	{
		// Instanciate the middleware auth
		$this->middleware('auth');

		// installs global error and exception handlers
		\Rollbar::init(array('access_token' => env('ROLLBAR_ACCESS_TOKEN')));

		// Check if user is logged in
		if (\Auth::check()) {

			// if user is logged in, run the 'getUsersRole' method
			$this->role = $this->getUsersRole(\Auth::user()->id);
		}
	}

	/**
	 * Show all company contact
	 * @return collection      A collection of all contacts that are companies
	 */
	public function indexCompany()
	{
		// Using the getContactByRole we pull specific contacts for the user if not admin
		$contacts = $this->getContactsByRole(new \App\CompanyContact);

		if (! is_null($contacts['shared'])) {
			$contacts['shared'] = $this->createdByIdToEmail($contacts['shared']);
		}

		if (! is_null($contacts['private'])) {
			$contacts['private'] = $this->createdByIdToEmail($contacts['private']);
		}

		// Return the contacts
		return view('contact.companies.index')->with([
			'contacts' => $contacts
		]);
	}

	public function indexPeople()
	{
		$contacts = $this->getContactsByRole(new \App\PeopleContact, $request->filter);

		if (! is_null($contacts['shared'])) {
			$contacts['shared'] = $this->createdByIdToEmail($contacts['shared']);
		}

		if (! is_null($contacts['private'])) {
			$contacts['private'] = $this->createdByIdToEmail($contacts['private']);
		}

		return view('contact.people.index')->with([
			'contacts' => $contacts
		]);
	}

	public function createdByIdToEmail($contacts)
	{
		$contacts = $contacts->toArray();

		foreach ($contacts as $contactKey => $contactValue) {
			unset($contacts[$contactKey]['created_by']);

			$createdBy = CrudHelper::show(new \App\User, 'id', $contactValue['created_by'])->first();

			$contacts[$contactKey]['created_by'] = $createdBy->email;
		}

		return $contacts;
	}

	public function showCompany($id)
	{
		$contact = $this->showContact(new \App\CompanyContact, $id, ['category']);

		return view('contact.companies.show')->with([
			'contact' => $contact
		]);
	}

	public function showPeople($id)
	{
		$contact = $this->showContact(new \App\PeopleContact, $id, ['category', 'companies']);

		return view('contact.people.show')->with([
			'contact' => $contact
		]);
	}

	public function createCompany()
	{
		$availableUsers = $this->getAllUsers();
		$companyCategories = $this->getCategories(new \App\CompanyCategory);

		return view('contact.companies.create')->with([
			'companyCategories' => $companyCategories,
			'availableUsers' => $availableUsers
		]);
	}

	public function createPeople()
	{
		$availableUsers = $this->getAllUsers();
		$peopleCategories = $this->getCategories(new \App\PeopleCategory);
		$companiesSelect = $this->companiesSelect();

		return view('contact.people.create')->with([
			'companiesSelect' => $companiesSelect,
			'peopleCategories' => $peopleCategories,
			'availableUsers' => $availableUsers
		]);
	}

    	public function storeCompany(Request $request)
	{
		$contact = $this->storeContactComplete(new \App\CompanyContact, new \App\CompanyCategory, $request->all());

		return redirect()->route('contact.company.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function storePeople(Request $request)
	{
		dd($request->note);
		$contact = $this->storeContactComplete(new \App\PeopleContact, new \App\PeopleCategory, $request->all());

		return redirect()->route('contact.people.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function editCompany($id)
	{
		$editContact = $this->editContactComplete(new \App\CompanyContact, new \App\CompanyCategory, $id,  ['category']);

		return view('contact.companies.edit')->with([
			'contact' => $editContact['contact'],
			'companyCategories' => $editContact['categories'],
			'selectedCategories' => $editContact['selectedCategories'],
			'availableUsers' => $editContact['availableUsers'],
			'canView' => $editContact['canView'],
		]);
	}

	public function editPeople($id)
	{
		$editContact = $this->editContactComplete(new \App\PeopleContact, new \App\PeopleCategory, $id, ['category', 'companies', 'canView', 'notesHistory']);

		$companiesSelect = $this->companiesSelect();

		return view('contact.people.edit')->with([
			'contact' => $editContact['contact'],
			'companiesSelect' => $companiesSelect,
			'contactCompanies' => $editContact['contactCompanies'],
			'peopleCategories' => $editContact['categories'],
			'selectedCategories' => $editContact['selectedCategories'],
			'availableUsers' => $editContact['availableUsers'],
			'canView' => $editContact['canView'],
			'notesHistory' => $editContact['notesHistory'],
		]);
	}

	public function editContactComplete($model, $catModel, $id, $with)
	{
		$availableUsers = $this->getAllUsers();

		$contact = $this->showContact($model, $id, $with);

		if (! empty($contact['category'])) {
			$selectedCategories = $contact['category'];
		}

		if (! empty($contact['canView'])); {
			$canView = $contact['canView'];
		}

		if (! empty($contact['notesHistory'])); {
			$notesHistory = $contact['notesHistory'];
		}

		if (isset($contact['companies']) && ! empty($contact['companies'])) {
			$contactCompanies = $contact['companies'][0]['id'];
		}

		$categories = $this->unsetSelectedCategory($catModel, $selectedCategories);
		$availableUsers = $this->unsetCanView($canView);

		return [
			'contact' => $contact,
			'contactCompanies' => isset($contactCompanies) ? $contactCompanies : null,
			'selectedCategories' => isset($selectedCategories) ? $selectedCategories : null,
			'availableUsers' => isset($availableUsers) ? $availableUsers : null,
			'canView' => isset($canView) ? $canView : null,
			'categories' => isset($categories) ? $categories : null,
			'notesHistory' => isset($notesHistory) ? $notesHistory : null,
		];
	}

	public function unsetCanView($canViews)
	{
		$availableUsers = $this->getAllUsers();

		foreach ($canViews as $canView) {
			foreach ($availableUsers as $availableUsersKey => $user) {
				if ($canView->id === $user->id) {
					unset($availableUsers[$availableUsersKey]);
				}

			}
		}

		return $availableUsers;
	}

	public function unsetSelectedCategory($model, $selectedCategories)
	{
		$allCategories = $this->getCategories($model);

		foreach ($selectedCategories as $selectedCategory) {
			foreach ($allCategories as $categoryKey => $category) {

				if ($selectedCategory['category'] === $category['category']) {
					unset($allCategories[$categoryKey]);
				}

			}
		}

		return $allCategories;
	}

	public function deleteCompany(Request $request, $id)
	{
		$contact = $this->destroyContact(new \App\CompanyContact, $id);

		return redirect()->route('contact.company.index')->with([
			'success_message' => 'Contact has been deleted...'
		]);
	}

	public function deletePeople(Request $request, $id)
	{
		$contact = $this->destroyContact(new \App\PeopleContact, $id);

		return redirect()->route('contact.people.index')->with([
			'success_message' => 'Contact has been deleted...'
		]);
	}

	public function destroyContact($model, $id)
	{
		$contact = CrudHelper::destroy($model, $id);

		return $contact;
	}

	public function updateCompany(Request $request, $id)
	{
		$contact = CrudHelper::show(new \App\CompanyContact, 'id', $id);

		foreach ($request->all() as $updateField => $updateValue) {
			$updateContact[$updateField] = $updateValue;
		}

		$contact->canView($updateContact['canView']);

		if (! is_null($updateContact['category'])) {
			$categoryIds = $this->updateCategories(new \App\CompanyCategory, $updateContact['category']);

			$contact->category()->sync($categoryIds);
		}

		$contact->canView()->detach();

		if (! is_null($updateContact['can_view'])) {
			$contact->canView()->sync($updateContact['can_view']);
		}

		$contact->update($updateContact);

		return redirect()->back()->with([
			'success_message' => 'Contact has been updated...'
		]);
	}

    	public function updatePeople(Request $request, $id)
    	{
    		$contact = CrudHelper::show(new \App\PeopleContact, 'id', $id);

    		if (! is_null($request->notes)) {
    			$contact->first()->notesHistory()->create([
    				'note' => $request->notes
    			]);
    		}

    		foreach ($request->all() as $updateField => $updateValue) {
    			$updateContact[$updateField] = $updateValue;
    		}

    		if ($request->hasFile('avatar')) {
			$avatarUpload = $this->avatarUpload($request->file('avatar'));

			$updateContact['avatar'] = $avatarUpload;
		}

    		$contact->first()->canView()->detach();

		if (! is_null($updateContact['can_view'])) {
			$contact->first()->canView()->sync($updateContact['can_view']);
		}

    		if (! is_null($updateContact['category'])) {

			foreach ($$updateContact['category'] as $categoryKey => $categoryValue) {
				$updateContact[$categoryKey]['category'] = strtolower($categoryValue);
			}

			$categoryIds = $this->updateCategories(new \App\PeopleCategory, $updateContact['category']);

			$contact->first()->category()->sync($categoryIds);
		}

    		if (isset($updateContact['company']) && $updateContact['company'] !== '0') {

			$contactComapany = PeopleContact::find($contact['id']);

			$contactComapany->companies()->sync([$updateContact['company']]);
		}

		unset($updateContact['_method']);
    		unset($updateContact['_token']);
    		unset($updateContact['company']);
    		unset($updateContact['can_view']);
    		unset($updateContact['category']);
    		unset($updateContact['notes']);

    		$contact->update($updateContact);

    		return redirect()->back()->with([
    			'success_message' => 'Contact has been updated...'
    		]);
    	}

    	public function updateCategories($catModel, $data)
    	{
    		foreach ($data as $categoryKey => $categoryValue) {
			$categories[] = $categoryKey;
		}

		foreach ($categories as $category) {
			$findCategory = CrudHelper::show($catModel, 'category', $category)->first();

			$categoryId[] = $findCategory['id'];
		}

		return $categoryId;
    	}

    	public function companiesSelect()
    	{
    		$companies = CrudHelper::index(new \App\CompanyContact)->get();

    		foreach ($companies as $companyKey => $companyValue) {
    			$companiesSelect[$companyValue['id']] = $companyValue['name'];
    		}

    		$companiesSelect[0] = 'Select Company';

    		return $companiesSelect;
    	}

    	public function getCategories($model)
    	{
    		$categories = CrudHelper::index($model)->get();

    		return $categories;
    	}

    	public function storeContactComplete($model, $catModel, $data)
    	{
    		$contact = $this->createContact($model, $data);

		if (! is_null($data['category'])) {
			$categoryIds = $this->updateCategories($catModel, $data['category']);

			$contact->category()->sync($categoryIds);
		}

		if (isset($data['company']) && $data['company'] !== '0') {
			$contact = PeopleContact::find($contact['id']);

			$contact->companies()->attach($data['company']);

			$contact->save();
		}

		return $contact;
    	}

    	/**
	 * Grab a logged in users role and who they are
	 * @param  int          $userId     the id of the logged in user
	 * @return   array                        return the role id, the actual ame of the role, and the users id
	 */
	public function getUsersRole($userId)
	{
		// Find a user by their ID
		$user = CrudHelper::show(new \App\User, 'id', $userId, ['roles'])->first();

		// Define the role from the users information
		$role= $user['roles']->first();

		// Build role array
		$role = [
			'id' => $role->id,
			'role' => $role->role,
			'userId' => $user->id
		];

		// Return the role data
		return $role;
	}

    	public function avatarUpload($upload)
    	{
    		$destinationPath = 'images/avatars/';

    		$fileName = 'avatar_' . crc32($upload->getClientOriginalName()) . '.' . $upload->getClientOriginalExtension();

    		$upload->move($destinationPath, $fileName);

    		$avatar = url('/') . '/' . $destinationPath . $fileName;

    		return $avatar;
    	}

    	/**
	 * Grab all contacts for the supplied model
	 * @uses  	 CrudHelper::index Grabs all items for a given model
	 * @param  Eloquent     $model     The eloquent model to search contacts
	 * @return   Collection                      The collection of all contacts
	 */
	public function getAll($model)
	{
		// Grab all contacts using the Sapioweb CrudHelper
		$contacts = CrudHelper::index($model)->get();

		return $contacts;
	}

    	public function getContactsByRole($model, $filter = null)
	{
		// dd($filter);

		switch (true) {
			case $this->role['role'] === 'admin':
				$contacts = $this->getAll($model);
				break;

			default:
				$contacts = $model->where('created_by', '=', $this->role['userId'])->with('canView')->get();

				$sharedContacts = $model->whereHas('canView', function ($query) {
					$query->where('user_id', '=', \Auth::user()->id);
				})->get();
				break;
		}

		return [
			'private' => $contacts,
			'shared' => isset($sharedContacts) ? $sharedContacts : null
		];
	}

	public function showContact($model, $contactId, $relationships = [])
	{
		$contact = CrudHelper::show($model, 'id', $contactId, $relationships);

		if ($contact == null) {
			abort(404);
		}

		return $contact->first();
	}

	public function canView($createdContact, $canView)
	{
		$createdContact->canView()->sync($canView);

		return null;
	}

	public function getAllUsers()
	{
		// Grab all available users in system
		$users = CrudHelper::index(new \App\User)->get();

		foreach ($users as $userKey => $userValue) {
			if (\Auth::user()->email == $users[$userKey]['email']) {
				unset($users[$userKey]);
			}
		}

		return $users;
	}

	public function createContact($model, $data)
	{
		if ($data['avatar']) {
			$avatarUpload = $this->avatarUpload($data['avatar']);

			$data['avatar'] = $avatarUpload;
		}

		unset($data['_token']);

		$data['created_by'] = \Auth::user()->id;

		$contact = CrudHelper::store($model, $data);

		if (isset($data['can_view'])) {
			$canView = $data['can_view'];

			$this->canView($contact, $canView);
		}

		return $contact;
	}
}
