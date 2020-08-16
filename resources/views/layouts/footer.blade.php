<footer>
			<div class="container-fluid  mt-5">
				<div class="row">
					<div class="col-lg-12 p-0">
						<div class="footer-cover px-5 py-3">
							<div class="row">
								<div class="col-lg-6 wow bounce" data-wow-duration="1s" data-wow-delay="1s">
									<div class="footer-info">
										<h4 style="color: #000000a3">About Us</h4>
										<p>Any questions? Let us know via email.</p>
									</div>
								</div>
								<div class="col-lg-3 wow bounce" data-wow-duration="1s" data-wow-delay="0s">
									<h5>Social Links</h5>
									<div class="footer-social wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
										<a href="https://www.facebook.com/sastoshowroom/" target="_blank"><i class="fab fa-facebook"></i></a>
										<a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></i></a>
										<a href="https://youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 p-0">
						<div class="footer-copyright wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
							<p>CopyRight ©2018 Sasto Showroom Pvt Ltd . To report complaints, please contact us.</p>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<script async type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<script async type="text/javascript" src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<script async type="text/javascript" src="{{ asset('js/main.js') }}"></script>
		<script async type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
		<script async type="text/javascript" src="{{ asset('js/wow.min.js') }}"></script>
		@yield('scripts')
		<script>


			@if (Session::has('success'))
					toastr.success('{{ Session::get("success") }}');
			@endif
			@if (Session::has('info'))
					toastr.info('{{ Session::get("info") }}');
			@endif


	$('.order-btn').click(function(e){
		e.preventDefault();
		$('#myModal').css('display','block');
		var product_id = $(this).data("product-id");
		var slug = $(this).data("product-slug");
		$('#myModal input[name="product_id"]').val(product_id);

		var user_id = $(this).data("user-id");
		$('#myModal input[name="user_id"]').val(user_id);
		console.log(product_id);console.log(slug);
		$.get('https://www.sastoshowroom.com/ajax/set_session', { product_id , slug}, function(data){
			// console.log(data);
		});
		
	});

	$('.specs').click(function(){
			$('#myModal2').css('display','block');
		});
	$('#closeit').click(function(){
		$('#myModal2').css('display','none');
	});
	$('.review-btn').click(function(e){
		$(this).prop('disabled', true);
	});
		// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}

	$('.list-group-item').hover(function(){
		$(this).find('.sub-list').toggleClass('hide');
	});

		</script>
		<!--Start of Tawk.to Script-->
		<!-- <script defer type="text/javascript">
			var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
		var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
		s1.async=true;
		s1.src='https://embed.tawk.to/5b6d1585afc2c34e96e76f73/default';
		s1.charset='UTF-8';
		s1.setAttribute('crossorigin','*');
		s0.parentNode.insertBefore(s1,s0);
		})();
		</script> -->
		<!--End of Tawk.to Script-->
	</body>
</html>