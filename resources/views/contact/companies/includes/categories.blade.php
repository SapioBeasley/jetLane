<div class="col-md-12">
	<div class="row">

		@foreach($selectedCategories as $selectedCategory)
			<label class="col-md-6">
				{!! Form::checkbox('category[' . $selectedCategory['category'] . ']', '1', '1') !!} {{$selectedCategory['category']}}
			</label>
		@endforeach

		@foreach($companyCategories as $companyCategory)
			<label class="col-md-6">
				{!! Form::checkbox('category[' . $companyCategory['category'] . ']', '1') !!} {{$companyCategory['category']}}
			</label>
		@endforeach

	</div>
</div>
