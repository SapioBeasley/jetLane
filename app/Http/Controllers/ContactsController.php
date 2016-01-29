<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sapioweb\CrudHelper\CrudyController as CrudHelper;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PeopleContact;

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

	// Companies Pages

	public function indexCompany()
	{
		$companies = CrudHelper::index(new \App\CompanyContact);

		return view('contact.companies.index')->with([
			'companies' => $companies
		]);
	}

	public function showCompany($id)
	{
		$contact = CrudHelper::show(new \App\CompanyContact, 'id', $id);

		if ($contact == null) {
			abort(404);
		}

		return view('contact.companies.show')->with([
			'contact' => $contact
		]);
	}

	public function createCompany()
	{
		return view('contact.companies.create');
	}

	public function storeCompany(Request $request)
	{
		$contact = CrudHelper::store(new \App\CompanyContact, $request->all());

		return redirect()->route('contact.company.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function indexPeople()
	{
		$peoples = CrudHelper::index(new \App\PeopleContact);

		return view('contact.people.index')->with([
			'peoples' => $peoples
		]);
	}

	public function createPeople()
	{
		$companiesSelect = $this->companiesSelect();

		return view('contact.people.create')->with([
			'companiesSelect' => $companiesSelect
		]);
	}

	public function storePeople(Request $request)
	{
		$createData = $request->all();

		if ($request->hasFile('avatar')) {
			$avatarUpload = $this->avatarUpload($request->file('avatar'));

			$createData['avatar'] = $avatarUpload;
		}

		$contact = CrudHelper::store(new \App\PeopleContact, $createData);

		if ($createData['company'] !== '0') {

			$contact = PeopleContact::find($contact['id']);

			$contact->companies()->attach($createData['company']);

			$contact->save();
		}

		return redirect()->route('contact.people.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function showPeople($id)
	{
		$contact = CrudHelper::show(new \App\PeopleContact, 'id', $id, ['companies']);

		if ($contact == null) {
			abort(404);
		}

		return view('contact.people.show')->with([
			'contact' => $contact
		]);
	}

	public function editCompany($id)
	{
		$contact = CrudHelper::show(new \App\CompanyContact, 'id', $id);

		return view('contact.companies.edit')->with([
			'contact' => $contact
		]);
	}

	public function editPeople($id)
	{
		$contact = CrudHelper::show(new \App\PeopleContact, 'id', $id, ['companies']);

		if (isset($contact['companies']) && ! empty($contact['companies'])) {
			$contactCompanies = $contact['companies'][0]['id'];
		}

		$companiesSelect = $this->companiesSelect();

		return view('contact.people.edit')->with([
			'contact' => $contact,
			'companiesSelect' => $companiesSelect,
			'contactCompanies' => $contactCompanies
		]);
	}

	public function deleteCompany(Request $request, $id)
	{
		$contact = CrudHelper::destroy(new \App\CompanyContact, 'id', $id);

		return redirect()->route('contact.company.index')->with([
			'success_message' => 'Contact has been deleted...'
		]);
	}

	public function deletePeople(Request $request, $id)
	{
		$contact = CrudHelper::destroy(new \App\PeopleContact, 'id', $id);

		return redirect()->route('contact.people.index')->with([
			'success_message' => 'Contact has been deleted...'
		]);
	}

	public function updateCompany(Request $request, $id)
	{
		$contact = CrudHelper::show(new \App\CompanyContact, 'id', $id);

		foreach ($request->all() as $updateField => $updateValue) {
			$updateContact[$updateField] = $updateValue;
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

    		if ($updateContact['company'] !== '0') {

			$contactComapany = PeopleContact::find($contact['id']);

			$contactComapany->companies()->sync([$updateContact['company']]);
		}

    		$contact->update($updateContact);

    		return redirect()->back()->with([
    			'success_message' => 'Contact has been updated...'
    		]);
    	}

    	public function avatarUpload($upload)
    	{
    		$destinationPath = 'images/avatars/';

    		$fileName = 'avatar_' . crc32($upload->getClientOriginalName()) . '.' . $upload->getClientOriginalExtension();

    		$upload->move($destinationPath, $fileName);

    		$avatar = url('/') . '/' . $destinationPath . $fileName;

    		return $avatar;
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
}
