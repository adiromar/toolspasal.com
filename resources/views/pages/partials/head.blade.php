
<div id="show" class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-3 col-lg-3 px-0">
			<nav class="navbar navbar-light bg-light brop-back">
				<button class="navbar-toggler cata-back" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				Category
				</button>
				<div class="collapse navbar-collapse list-back" id="navbarSupportedContent">
				@foreach (App\Category::all() as $cat)
					<div id="drop-place1" class="btn-group dropright  d-block">
						<a class="nav-link dropdown-toggle " href="{{ route('category.product', $cat->slug) }}">{{ $cat->name }}
						</a>
					</div>
				@endforeach
					<a class="nav-link" href="#">All</a>
				</div>
			</nav>
		</div>

		@include('pages.partials.searchheader')
		
	</div>
</div>
