<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Sapioweb\CrudHelper\CrudyController as CrudHelper;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
		$companies = CrudHelper::index(new \App\Company);

		return view('contact.companies.index')->with([
			'companies' => $companies
		]);
	}

	public function showCompany($id)
	{
		$contact = CrudHelper::show(new \App\Company, 'id', $id);

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
		$contact = CrudHelper::store(new \App\Company, $request->all());

		return redirect()->route('contact.company.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function indexPeople()
	{
		$peoples = CrudHelper::index(new \App\People);

		return view('contact.people.index')->with([
			'peoples' => $peoples
		]);
	}

	public function createPeople()
	{
		return view('contact.people.create');
	}

	public function storePeople(Request $request)
	{
		$createData = $request->all();

		$avatarUpload = $this->avatarUpload($request->file('avatar'));

		$createData['avatar'] = $avatarUpload;

		$contact = CrudHelper::store(new \App\People, $createData);

		return redirect()->route('contact.people.show', $contact->id)->with([
			'success_message' => 'Conact Successfully created...'
		]);
	}

	public function showPeople($id)
	{
		$contact = CrudHelper::show(new \App\People, 'id', $id);

		if ($contact == null) {
			abort(404);
		}

		return view('contact.people.show')->with([
			'contact' => $contact
		]);
	}

	public function editCompany($id)
	{
		$contact = CrudHelper::show(new \App\Company, 'id', $id);

		return view('contact.companies.edit')->with([
			'contact' => $contact
		]);
	}

	public function editPeople($id)
	{
		$contact = CrudHelper::show(new \App\People, 'id', $id);

		return view('contact.people.edit')->with([
			'contact' => $contact
		]);
	}

	public function deleteCompany(Request $request, $id)
	{
		$contact = CrudHelper::destroy(new \App\Company, 'id', $id);

		return redirect()->route('contact.company.index')->with([
			'success_message' => 'Contact has been deleted...'
		]);
	}

	public function deletePeople(Request $request, $id)
	{
		$contact = CrudHelper::destroy(new \App\People, 'id', $id);

		return redirect()->route('contact.people.index')->with([
			'success_message' => 'Contact has been deleted...'
		]);
	}

	public function updateCompany(Request $request, $id)
	{
		$contact = CrudHelper::show(new \App\Company, 'id', $id);

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
    		$avatarUpload = $this->avatarUpload($request->file('avatar'));

    		$contact = CrudHelper::show(new \App\People, 'id', $id);

    		foreach ($request->all() as $updateField => $updateValue) {
    			$updateContact[$updateField] = $updateValue;
    		}

    		$updateContact['avatar'] = $avatarUpload;

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
}
