<div class=" col-sm-12 col-md-9 col-lg-9 px-0 form-search">
	<form action="" method="post">
		{{-- {{ route('search.product') }} --}}
		{{csrf_field()}}
		<div class="row">
			<div class="col-md-4">
				<input  type="search" placeholder="Find Product" name="name" value="{{old('name')}}">
			</div>
			<div class="col-md-4">
				<input  type="search" placeholder="Location" name="location" list="locations" value="{{old('location')}}">
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
