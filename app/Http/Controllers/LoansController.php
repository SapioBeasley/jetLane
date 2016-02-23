<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use CrudHelper;

class LoansController extends Controller
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

	public function indexLoans()
	{
		$loans = \CrudHelper::index(new \App\Loan)->paginate(15);

		return view('loans.index')->with([
			'loans' => $loans
		]);
	}

	public function createLoans()
	{
		return view('loans.create');
	}

	public function showLoans($id)
	{
		$loan = $this->getLoan($id)->first();

		return view('loans.show')->with([
			'loan' => $loan
		]);
	}

	public function storeLoans(Request $request)
	{
		$createLoan = $this->storeLoan($request->all());

		return redirect()->route('loans.index')->with('success_message', 'Loan successfully created...');
	}

	public function editLoans($id)
	{
		$loan = $this->getLoan($id)->first();

		return view('loans.edit')->with([
			'loan' => $loan
		]);
	}

	public function duplicateLoans($id)
	{
		$loan = $this->getLoan($id)->first()->toArray();

		unset($loan['id']);
		unset($loan['created_at']);
		unset($loan['updated_at']);

		$loan['loan_title'] = 'Duplicate of ' . $loan['loan_title'];

		$duplicateLoan = $loan;

		$duplicateLoan = CrudHelper::store(new \App\Loan, $duplicateLoan);

		return redirect()->back()->with('success_message', 'Loan has been duplicated...');
	}

	public function updateLoans(Request $request, $id)
	{
		$loan = $this->getLoan($id);

		foreach ($request->all() as $requestKey => $requestValue) {
			$updateData[$requestKey] = $requestValue;
		}

		unset($updateData['_method']);
		unset($updateData['_token']);

		$loan = $loan->update($updateData);

		return redirect()->back()->with('success_message', 'Loan updated successfully...');
	}

	public function deleteLoans($id)
	{
		$loan = $this->getLoan($id)->first();
		dd($loan);
	}

	public function getLoan($id)
	{
		$loan = \CrudHelper::show(new \App\Loan, 'id', $id);

		return $loan;
	}

	public function storeLoan($createData)
	{
		$createLoan = CrudHelper::store(new \App\Loan, $createData);

		return $createLoan;
	}
}
