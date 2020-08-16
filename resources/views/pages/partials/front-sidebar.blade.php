<div class="col-sm-12 col-md-3 col-lg-3 product-sidebar">
				<div class="list-bar wow fadeIn"
					data-wow-duration="2s" data-wow-delay="0s">
					<i class="fas fa-bars"></i>
					Products
				</div>
				<div class="list-product wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.5s">
					<ul class="list-group cat-bar">
						<li class="list-group-item">
							<div><a href="{{ url('/') }}"><b>Browse Categories</b></a></div>
						</li>
						<?php $categories = App\Category::where('parentId', 0)->get(); ?>
						@foreach ($categories as $cat)
							<li class="list-group-item">
								<div>
									<a href="{{ route('category.product', $cat->slug) }}">{{ $cat->name }}</a>
								</div>
								<i class="fas fa-caret-right"></i>
								@if ( $cat->children() )
								<div class="sub-list hide">
									@foreach ( $cat->children() as $child )
										<a href="{{ route('category.product', $child->slug) }}">{{ $child->name }} ({{ $child->products()->notsuspended()->count() }})</a><br>
									@endforeach
								</div>
								@endif
							</li>
						@endforeach
					</ul>
				</div>
			</div>