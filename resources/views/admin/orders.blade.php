@extends('layouts.app')

<style>
    .view-modal-row{
        background: aliceblue;
        border: 1px solid lightgrey;
        padding: 5px;
        margin-bottom: 12px;
    }
    .pro_table{
        width: 100%;
        display: table;
    }
    .pro_table tr th{
        display: inline-flex;
    }
    .table_product span td{
        display: table-cell;
    }
    .table_product span th{
        display: table-cell;
    }
</style>
@section('content')
<div class="container" style="padding: 25px 15px">
    <h5>Admin Panel</h5>
    <div class="row">
    <div class="col-md-3">
        
            {{-- @include('admin.sidebar') --}}
            @if(Auth::user()->hasRoles('admin')){
                @include('admin.sidebar')
            @else
                @include('partials.adminsidebar')
            @endif
    </div>
    <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Show All Orders</h5>
            <p class="card-text">
                 

                <table id="exampleasd" class="table table-condensed table-responsive">
                    <thead>
                        <tr>
                            <th>#</th>
                            {{-- <th>Product Details</th> --}}
                            <th>Client Name</th>
                            <th>Email</th>
                            <th>Phone No.</th>
                            <th>Delivery Address</th>
                            <th>Order Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $k = 1;
                        @endphp
                    @foreach ($orders as $o)
                        @php
                            $name = App\User::find($o->ordered_by);
                            
                        @endphp

                         <tr>
                            <td>{{ $k }}</td>
                            <td>{{ $o->clientName }}</td>
                            <td>{{ $o->userEmail }}</td>
                            <td>{{ $o->phone }}</td>
                            <td>{{ $o->shippingAddress }}</td>
                            <td>{{ $o->order_date }}</td>
                            <td>
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#view_modal{{ $o->id }}"><i class="fa fa-eye"></i></button>
                            </td>
                         </tr>

<div class="modal fade" id="view_modal{{ $o->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Order </h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
            <div class="row ml-3 mr-3">
                @php
                    $new_order = App\OrderNew::find($o->id);
                    // dd($new_order);
                @endphp
                
                <div class="col-md-12 mb-3">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <small class="float-left">Unique Order Identifier: {{ $o->unique_order_identifier }}</small>
                        </div>
                        <div class="col-md-6 col-sm-12" style="text-align: right;">
                            <small class="float-right;">Order Date: {{ $o->order_date }}</small>
                        </div>
                    </div>
                    
                </div>
            
                <div class="col-md-4 view-modal-row">
                    <label>Client Full Name</label>
                    <p>{{ $o->clientName }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>Client Email</label>
                    <p>{{ $o->userEmail }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>Phone Number</label>
                    <p>{{ $o->phone }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>State</label>
                    <p>{{ $o->state }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>City</label>
                    <p>{{ $o->city }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>Shipping Address</label>
                    <p>{{ $o->shippingAddress }}</p>
                </div>
                
                <div class="col-md-4 view-modal-row">
                    <label>Payment Type</label>
                    <p>{{ $o->paymentType }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>Payment Status</label>
                    @php
                        if($o->paymentStatus == 1){
                            $pay = 'Paid';
                        }elseif($o->paymentStatus == 0){
                            $pay = 'Pending';
                        }else{
                            $pay = 'N/A';
                        }
                    @endphp
                    <p>{{ $pay }}</p>
                </div>

                <div class="col-md-4 view-modal-row">
                    <label>Order Notes</label>
                    <p>{{ $o->order_notes }}</p>
                </div>

                @php
                    $detail = App\OrderDetailNew::where('orderId', $o->id)->get();
                    // dd($detail);
                @endphp

                
                           
                
                <div class="row" style="text-align: center;margin: auto;">
                    <div class="col-12 col-lg-12 col-sm-12 mt-3 mb-3">
                        <h4>Product Details</h4>
                    </div>

                    @foreach ($detail as $d)
                    @php
                        $pp = App\Product::find($d->productId);
                        // print_r($pp);
                        $image = $pp->featuredImage;
                        
                    @endphp


                    <div class="col-md-3 view-modal-row">
                        <img src="{{ asset('uploads/products/thumbnails/'.$image)}}" alt="Image" width="70" height="85">
                    </div>

                    <div class="col-md-3 view-modal-row">
                        <span class="td">Rate : NRS. {{ $d->rate }}</span>
                    </div>

                    <div class="col-md-3 view-modal-row">
                        <span class="td">Quantity: {{ $d->qty }}</span>
                    </div>

                    <div class="col-md-3 view-modal-row">
                        <span class="td">Total : NRS. {{ $d->rate * $d->qty}}</span>
                    </div>

                    
                    @endforeach

                  </div>
                
                
                
            </div>

            <hr>
            <div class="row mt-3">
            <form action="{{ route('update.payment') }}" method="post">
                    {{csrf_field()}}
                    <div class="col-md-4 col-sm-12">
                      <label>Payment Status</label>
                      <select name="payment_Status" class="form-control">
                          
                          <option value="1">Paid</option>
                          <option value="0">Pending</option>
                          <option value="2">Cancelled</option>
                          <option value="3">Damaged</option>
                      </select>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <label>Update Payment</label>
                        <input type="hidden" name="order_id" value="{{ $o->id }}">
                        <input type="submit" name="btnsub" value="Update Payment" class="btn btn-primary btn-sm">
                    </div>
                    
                </form>
            </div>

		</div>
		<div class="modal-footer">
            
		  
		</div>
	  </div>
	</div>
  </div>

  


                        @php
                            $k++;
                        @endphp
                    @endforeach
                    </tbody>
                </table>
            </p>
          </div>
        </div>
    </div>
    </div>
</div>
@endsection

<!-- Products Insert Modal -->
{{-- <div class="modal fade" id="view_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
	  <div class="modal-content">
		<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">View Order</h5>
          
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
            <div class="row">
                <h3>Result</h3>
                <div class="resp">
                
                </div>
                
            </div>
		</div>
		<div class="modal-footer">
		  
		  <a href="#" class="show-register btn btn-primary btn-sm" class="close" data-dismiss="modal" >Register</a>
		</div>
	  </div>
	</div>
  </div> --}}

  <script src="{{ asset('themes/11/js/jquery-3.3.1.min.js') }}"></script>
  <script>
      $(document).ready(function(){
      // show orders
      $('.view_order').click(function(e){
				e.preventDefault();
				// alert('clicked');
				let orderid = $(this).data('orderid');

				// alert(orderid);
				$.ajaxSetup({
				  headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  }
				});
                $('#view_modal').modal('show');
				$.ajax({
	               type:'POST',
	               url:'{{ route("admin.view_order_single") }}',
	               data: { orderid },
	               success:function(data) {
	               		if ( data.status == 200 ) {
                            
	               			$('.resp').html(data);

	               		}else{
							console.log('something is wrong');
                            $('.resp').text("asdasd ");
	               		}
	               }
	            });

			});
    });
</script>