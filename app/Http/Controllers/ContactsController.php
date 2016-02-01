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
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		// installs global error and exception handlers
		\Rollbar::init(array('access_token' => env('ROLLBAR_ACCESS_TOKEN')));
	}

	public function indexCompany()
	{
		$contacts = $this->getAll(new \App\CompanyContact);

		return view('contact.companies.index')->with([
			'contacts' => $contacts
		]);
	}

	public function indexPeople()
	{
		$contacts = $this->getAll(new \App\PeopleContact);

		return view('contact.people.index')->with([
			'contacts' => $contacts
		]);
	}

	public function getAll($model)
	{
		$contacts = CrudHelper::index($model);

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

	public function showContact($model, $contactId, $relationships = [])
	{
		$contact = CrudHelper::show($model, 'id', $contactId, $relationships);

		if ($contact == null) {
			abort(404);
		}

		return $contact;
	}

	public function createCompany()
	{
		$companyCategories = $this->getCategories(new \App\CompanyCategory);

		return view('contact.companies.create')->with([
			'companyCategories' => $companyCategories
		]);
	}

	public function createPeople()
	{
		$peopleCategories = $this->getCategories(new \App\PeopleCategory);
		$companiesSelect = $this->companiesSelect();

		return view('contact.people.create')->with([
			'companiesSelect' => $companiesSelect,
			'peopleCategories' => $peopleCategories
		]);
	}

	public function companiesSelect()
    	{
    		$companies = CrudHelper::index(new \App\CompanyContact)->toArray();

    		foreach ($companies as $companyKey => $companyValue) {
    			$companiesSelect[$companyValue['id']] = $companyValue['name'];
    		}

    		$companiesSelect[0] = 'Select Company';

    		return $companiesSelect;
    	}

    	public function getCategories($model)
    	{
    		$categories = CrudHelper::index($model);

    		return $categories;
    	}

    	public function storeCompany(Request $request)
	{
		$contact = $this->createContact(new \App\CompanyContact, $request->all());

		$data = $request->all();

		if (! is_null($data['category'])) {
			$categoryIds = $this->updateCategories(new \App\CompanyCategory, $data['category']);

			$contact->category()->sync($categoryIds);
		}

		return redirect()->route('contact.company.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function storePeople(Request $request)
	{
		$contact = $this->createContact(new \App\PeopleContact, $request->all());

		$data = $request->all();

		if (! is_null($data['category'])) {
			$categoryIds = $this->updateCategories(new \App\PeopleCategory, $data['category']);

			$contact->category()->sync($categoryIds);
		}

		if ($data['company'] !== '0') {
			$contact = PeopleContact::find($contact['id']);

			$contact->companies()->attach($data['company']);

			$contact->save();
		}

		return redirect()->route('contact.people.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function createContact($model, $data)
	{
		if ($data['avatar']) {
			$avatarUpload = $this->avatarUpload($data['avatar']);

			$data['avatar'] = $avatarUpload;
		}

		$contact = CrudHelper::store($model, $data);

		return $contact;
	}

	public function editCompany($id)
	{
		$contact = $this->showContact(new \App\CompanyContact, $id, ['category']);

		if (! empty($contact['category'])) {
			$selectedCategories = $contact['category'];
		}

		$companyCategories = $this->unsetSelectedCategory(new \App\CompanyCategory, $selectedCategories);

		return view('contact.companies.edit')->with([
			'contact' => $contact,
			'companyCategories' => $companyCategories,
			'selectedCategories' => $selectedCategories
		]);
	}

	public function editPeople($id)
	{
		$contact = $this->showContact(new \App\PeopleContact, $id, ['category', 'companies']);

		if (! empty($contact['category'])) {
			$selectedCategories = $contact['category'];
		}

		$peopleCategories = $this->unsetSelectedCategory(new \App\PeopleCategory, $selectedCategories);

		if (isset($contact['companies']) && ! empty($contact['companies'])) {
			$contactCompanies = $contact['companies'][0]['id'];
		}

		$companiesSelect = $this->companiesSelect();

		return view('contact.people.edit')->with([
			'contact' => $contact,
			'companiesSelect' => $companiesSelect,
			'contactCompanies' => $contactCompanies,
			'peopleCategories' => $peopleCategories,
			'selectedCategories' => $selectedCategories
		]);
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
		$contact = CrudHelper::destroy($model, 'id', $id);

		return $contact;
	}

	public function updateCompany(Request $request, $id)
	{
		$contact = CrudHelper::show(new \App\CompanyContact, 'id', $id);

		foreach ($request->all() as $updateField => $updateValue) {
			$updateContact[$updateField] = $updateValue;
		}

		if (! is_null($updateContact['category'])) {
			$categoryIds = $this->updateCategories(new \App\CompanyCategory, $updateContact['category']);

			$contact->category()->sync($categoryIds);
		}

		$contact->update($updateContact);

		return redirect()->back()->with([
			'success_message' => 'Contact has been updated...'
		]);
	}

    	public function updatePeople(Request $request, $id)
    	{
    		if ($request->hasFile('avatar')) {
			$avatarUpload = $this->avatarUpload($request->file('avatar'));

			$updateContact['avatar'] = $avatarUpload;
		}

    		$contact = CrudHelper::show(new \App\PeopleContact, 'id', $id);

    		foreach ($request->all() as $updateField => $updateValue) {
    			$updateContact[$updateField] = $updateValue;
    		}

    		if (! is_null($updateContact['category'])) {

			$categoryIds = $this->updateCategories(new \App\PeopleCategory, $updateContact['category']);

			$contact->category()->sync($categoryIds);
		}

    		if ($updateContact['company'] !== '0') {

			$contactComapany = PeopleContact::find($contact['id']);

			$contactComapany->companies()->sync([$updateContact['company']]);
		}

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
			$findCategory = CrudHelper::show($catModel, 'category', $category);

			$categoryId[] = $findCategory['id'];
		}

		return $categoryId;
    	}

    	public function avatarUpload($upload)
    	{
    		$destinationPath = 'images/avatars/';

    		$fileName = 'avatar_' . crc32($upload->getClientOriginalName()) . '.' . $upload->getClientOriginalExtension();

    		$upload->move($destinationPath, $fileName);

    		$avatar = url('/') . '/' . $destinationPath . $fileName;

    		return $avatar;
    	}
}
