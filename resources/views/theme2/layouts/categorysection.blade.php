<!-- Start Small Banner  -->
	<section class="small-banner section">
		<div class="container-fluid">
			<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Featured Categories</h2>
						</div>
					</div>
				</div>
			<div class="row">
				<!-- Single Banner  -->
			@foreach( App\Category::where('featured', 1)->inRandomOrder()->get()->take(3) as $category)
				<div class="col-lg-4 col-md-6 col-12">
					<div class="single-banner">
						<img src="{{ asset( $category->image ) }}" style="height: 259px;border: 1px solid #ccc;object-fit: contain;opacity: 0.6;" alt="#">
						<div class="content">
							<p>Featured</p>
							<h3>{{ $category->name }}</h3>
							<a href="{{ route('category.product.new2', $category->slug) }}">Discover Now</a>
						</div>
					</div>
				</div>
			@endforeach
				<!-- /End Single Banner  -->
			</div>
		</div>
	</section>
	<!-- End Small Banner -->