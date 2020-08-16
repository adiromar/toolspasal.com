<!-- Slider Area -->
	<section class="hero-slider">
		<?php $slider = App\Sliders::where('showSlider', 1)->latest()->get()->take(1); ?>
		<!-- Single Slider -->
		@foreach($slider as $slide)
		<div class="single-slider" style="background-image:url({{ 'uploads/sliders/' . $slide->sliderImage }})">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-lg-9 offset-lg-3 col-12">
						<div class="text-inner">
							<div class="row">
								<div class="col-lg-7 col-12">
									<div class="hero-text">
										<h1>{!! $slide->textMain !!}</h1>
										<p>{!! $slide->textSecondary !!}</p>
										<div class="button">
											<a href="{{ route('category.product.new2', str_slug($slide->categoryName)) }}" class="btn">Shop Now!</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->