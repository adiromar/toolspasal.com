
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
            <h5 class="card-title" style="color: green;">All Paid Orders</h5>
            

<table id="paidorder_tbl" class="table table-condensed table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Client Name</th>
            <th>Address</th>
            <th>phone</th>
            <th>Email</th>
            <th>Order Date</th>
            <th>Payment Date</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
@php
    $k=1;
@endphp
@foreach ($orders as $ord)
@php
    

    $shipping = DB::table('shipping_details')->where('shipping_details_id', $ord->shipping_details_id)->first();
    // $details = DB::table('order_details')->where('order_details_id', $ord->id)->first();
    $pay = DB::table('payment_details')->where('payment_id', $ord->payment_details_id)->first();
    
    $detail = App\OrderDetail::where('order_id', $ord->id)->get();
    // dd($detail);
    @endphp
    <tr>
    <td>{{ $k }}</td>
    @if($shipping)
    <td>{{ $shipping->client_name }}</td>
    <td>{{ $shipping->address }}</td>
    <td>{{ $shipping->phone }}</td>
    <td>{{ $shipping->email }}</td>
    @else
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
    @endif
    <td>{{ $ord->order_date }}</td>
    @if($pay)
    <td>{{ $pay->payment_date }}</td>
    @else
    <td></td>
    @endif
    <td>
        {{-- <a href="#" class="btn btn-primary btn-sm">View Order</a> --}}
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#view_modal{{ $ord->id }}"><i class="fa fa-eye"></i></button>
    </td>
    </tr>

    <div class="modal fade" id="view_modal{{ $ord->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        // $new_order = App\OrderNew::find($o->id);
                        // dd($new_order);
                    @endphp
                    <div class="col-md-12 mb-3">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <small class="float-left">Unique Order Identifier: {{ $ord->unique_order_identifier }}</small>
                            </div>
                            <div class="col-md-6 col-sm-12" style="text-align: right;">
                                <small class="float-right;">Order Date: {{ $ord->order_date }}</small>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-md-4 view-modal-row">
                        <label>Client Full Name</label>
                        @if($shipping)
                        <p>{{ $shipping->client_name }}</p>
                        @else
                        <p>-</p>
                        @endif
                    </div>
    
                    <div class="col-md-4 view-modal-row">
                        <label>Client Email</label>
                        @if($shipping)
                        <p>{{ $shipping->email }}</p>
                        @else
                        <p>-</p>
                        @endif
                    </div>
    
                    <div class="col-md-4 view-modal-row">
                        <label>Phone Number</label>
                        @if($shipping)
                        <p>{{ $shipping->phone }}</p>
                        @else
                        <p>-</p>
                        @endif
                    </div>
    
                    <div class="col-md-4 view-modal-row">
                        <label>State</label>
                        @if($shipping)
                        @php
                            if($shipping->state == 1){
                                $state = 'Province No. 1';
                            }elseif($shipping->state == 2){
                                $state = 'Province No. 1';
                            }elseif($shipping->state == 3){
                                $state = 'Bagmati Province';
                            }elseif($shipping->state == 4){
                                $state = 'Gandaki Province';
                            }elseif($shipping->state == 5){
                                $state = 'Province No. 5';
                            }elseif($shipping->state == 6){
                                $state = 'Karnali Province';
                            }elseif($shipping->state == 7){
                                $state = 'Sudurpaschim Province';
                            }else{
                                $state = 'N/A';
                            }
                        @endphp
                        <p>{{ $state }}</p>
                        @else
                        <p>-</p>
                        @endif
                    </div>
    
                    <div class="col-md-4 view-modal-row">
                        <label>City</label>
                        @if($shipping)
                        <p>{{ $shipping->city }}</p>
                        @else
                        <p>-</p>
                        @endif
                    </div>
    
                    <div class="col-md-4 view-modal-row">
                        <label>Shipping Address</label>
                        @if($shipping)
                        <p>{{ $shipping->address }}</p>
                        @else
                        <p>-</p>
                        @endif
                    </div>
                    
                    <div class="col-md-4 view-modal-row">
                        <label>Payment Type</label>
                        
                        <p>Cash On Delivery</p>
                        
                    </div>

                    <div class="col-md-4 view-modal-row">
                        <label>Payment Status</label>
                        @if($pay)
                        @php
                            if($pay->status == 1){
                                $payment = 'Paid';
                            }elseif($pay->status == 0){
                                $payment = 'Pending';
                            }else{
                                $payment = 'N/A';
                            }
                        @endphp
                        <p>{{ $payment }}</p>
                        @else
                            <p>Pending</p>
                        @endif
                    </div>

                    <div class="col-md-4 view-modal-row">
                        <label>Payment Made Date</label>
                        @if($pay)
                        
                            <p>{{ $pay->payment_date }}</p>
                        @endif
                    </div>
                </div>

                    {{-- product details --}}
                    <div class="row" style="text-align: center;margin: auto;">
                        <div class="col-12 col-lg-12 col-sm-12 mt-3 mb-3">
                            <h4>Product Details</h4>
                        </div>
                        @php
                            $sum = 0;
                        @endphp
                        @foreach ($detail as $d)
                        @php
                            $pp = App\Product::find($d->product_id);
                            // print_r($pp);
                            $image = $pp->featuredImage;
                            $sum += $d->rate * $d->quantity;
                        @endphp
    
                        <div class="col-md-3 view-modal-row">
                            <img src="{{ asset('uploads/products/thumbnails/'.$image)}}" alt="Image" width="70" height="85">
                        </div>
    
                        <div class="col-md-3 view-modal-row">
                            <span class="td">Rate : NRS. {{ $d->rate }}</span>
                        </div>
    
                        <div class="col-md-3 view-modal-row">
                            <span class="td">Quantity: {{ $d->quantity}}</span>
                        </div>
    
                        <div class="col-md-3 view-modal-row">
                            <span class="td">Total : NRS. {{ $d->rate * $d->quantity}}</span>
                        </div>
    
                        @endforeach
                        <div class="offset-md-9 col-md-3 view-modal-row">
                            <span class="td">Grand Total : NRS. {{ $sum }}</span>
                        </div>
                      </div>
                      {{-- end product details --}}
                    
                
    
                <hr>
                
        
    
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

          </div>
        </div>
    </div>
    </div>
</div>

@endsection