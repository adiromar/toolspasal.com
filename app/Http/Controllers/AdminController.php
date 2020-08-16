<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Orders;
use App\Order;
use App\OrderNew;
use App\OrderDetail;
use App\User;
use Auth;
use DB;

class AdminController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function featured(){

        return view('admin.featured');
    }

    public function deal_of_week(){

      return view('admin.deal_of_week');
  }

    public function unmake_featured(){

      Product::where('id', request()->notfeatured )->update([ 'featured' => 0 ]);
      session()->flash('success', 'Success');
      return redirect()->back();
    }

    public function make_featured(Request $request){

    	$this->validateWith([
    			'featured' => 'required',
    	]);

    	Product::where('id', $request->featured )->update([ 'featured' => 1 ]);
        
        session()->flash('success', 'Success');
        return redirect()->back();
    }

    public function make_deal_of_week(Request $request){

    	$this->validateWith([
          'deal_of_week' => 'required',
          'offer_time' => 'required',
    	]);

    	Product::where('id', $request->deal_of_week )->update([ 'deal_of_week' => 1 ,'dow_datetime' => $request->offer_time]);
        
        session()->flash('success', 'Success ! Deal of Week Updated');
        return redirect()->back();
    }

    public function unmake_deal_of_week(){
      
      Product::where('id', request()->not_deal )->update([ 'deal_of_week' => 0 ]);
      session()->flash('success', 'Success');
      return redirect()->back();
    }

    public function get_all_orders(){
      
      // $orders = Order::join('order_details', 'order_details.order_id', '=', 'orders.id')
      // ->join('shipping_details', 'shipping_details.shipping_details_id', '=', 'orders.shipping_details_id')
      // ->with('product')
      // ->get();

      $orders = OrderNew::where('paymentStatus', 0)->get();
      // dd($orders);
      return view('admin.orders')->with('orders', $orders);
    }

    public function get_all_orders_new(){
      // $orders = Order::where('paymentStatus', 0)->get();
      // $orders = Order::orderBy('id', 'desc')->with('product')->get();
    //   $orders = Order::orderBy('order_date')->get();

    //   $selections = [
    //     'id as orderId', 
    //     'order_details.product_id as productId', 
    //     'order_date as orderDate', 
    //     'order_status as orderStatus',
    //     'shipping_details_id as shippingDetailsId',
    //     'payment_details_id as paymentDetailsId',
    //     'ordered_by as orderedBy',
    //     'quantity'
    // ];

    $orders = Order::latest()
      ->join('payment_details', 'payment_details.payment_id', '=', 'orders.payment_details_id')
      ->where('payment_details.status', '0')
      ->orderBy('order_date')
      ->get();

      // dd($orders);
      return view('admin.orders_new')->with('orders', $orders);
    }

    // public function get_all_paid_orders(){
    //   $orders = OrderNew::where('paymentStatus', 1)->get();
    //   // dd($orders);
    //   return view('admin.paidOrders')->with('orders', $orders);
    // }

    public function get_all_paid_orders(){
      $orders = Order::latest()
      ->join('payment_details', 'payment_details.payment_id', '=', 'orders.payment_details_id')
      ->where('payment_details.status', '1')
      ->orderBy('order_date')->get();

      return view('admin.paidOrders')->with('orders', $orders);
    }

    public function suspend_users(){
      $user = User::all();

      return view('admin.suspend_users')->with('users', $user);
    }

    public function make_user_suspend(Request $request){

      if (empty($request->user_ids)) {

        User::where('suspend', '1')->update(['suspend' => 0]);

        session()->flash('success', 'Succesfull');
        return redirect()->back();
      }

      User::whereIn('id', $request->user_ids )->update([ 'suspend' => 1 ]);
      User::whereNotIn('id', $request->user_ids )->update([ 'suspend' => 0 ]);

      session()->flash('success', 'Succesfull');
      return redirect()->back();

    }

    public function clientThemeAssign(){
      // $user->roles()->first()->id;
      $users = User::with('roles')->join('role_user', 'role_user.user_id', '=', 'users.id')->where('role_user.role_id', '2')->get();
      $users1 = User::orderBy('id','desc')->get();

      return view('admin.client_theme_assign')->with('users', $users)->with('users1', $users1);
  }

  public function make_theme_assign(Request $request){

    $this->validateWith([
        'theme_assign' => 'required',
        'user_id' => 'required',
    ]);
    
    User::where('id', $request->user_id )->update([ 'assign_theme' => $request->theme_assign ]);
      
      session()->flash('success', 'Success ! Theme Assigned to User Successfully');
      return redirect()->back();
  }

  public function due_billing(){
    $title = 'Due Billing Amount';
    $bill = DB::table('due_bill')->get();
    return view('admin.due_bill')->with('bill', $bill)->with('title', $title);
  }

  

}
