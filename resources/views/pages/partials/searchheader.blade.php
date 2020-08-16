<div class=" col-sm-12 col-md-9 col-lg-9 px-0 form-search">
	<form action="{{ route('search.product') }}" method="post">
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-4">
				<input  type="search" placeholder="Find Product" name="name" aria-label="Search" value="{{old('name')}}">
			</div>
			<div class="col-md-4">
				<input  type="search" placeholder="Location" name="location" list="locations" aria-label="Search" value="{{old('location')}}">
			</div>
			<div class="col-md-4">
				<button  type="submit" name="submit" value="submit">Search</button>
			</div>
			<datalist id="locations">
				@foreach (DB::table('zones')->select('headquarter')->distinct()->get() as $z)
					<option value="{{ ucwords($z->headquarter) }}"></option>
				@endforeach
			</datalist>
	</div>
	</form>
</div>
