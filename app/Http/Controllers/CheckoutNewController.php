<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;

use App\Order;
use App\OrderDetail;
use App\Product;

use App\OrderNew;
use App\OrderDetailNew;
use App\User;
use Mail;
use DB;

class CheckoutNewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('theme1.checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     // dd($request);die;
    //     $this->validateWith([
    //         'username' => 'required',
    //         'delivery_address' => 'required',
    //         'user_email' => 'required',
    //         'number' => 'required',
    //         'product_id' => 'required'
    //     ]);

    //     $productids = $request->product_id;
    //     $supplierids = $request->supplier_id;
    //     $product_rate = $request->rate;

    //     // generate unique code token
    //     function generateRandomString($length = 20) {
    //         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //         $charactersLength = strlen($characters);
    //         $randomString = '';
    //         for ($i = 0; $i < $length; $i++) {
    //             $randomString .= $characters[rand(0, $charactersLength - 1)];
    //         }
    //         return $randomString;
    //     }

    //     $order_new = OrderNew::insertGetId([
    //         'clientName' => $request->full_name,
    //         'client_username' => $request->username,
    //         'userEmail' => $request->user_email,
    //         'shippingAddress' => $request->delivery_address,
    //         'phone' => $request->number,
    //         'state' => $request->ship_state,
    //         'city' => $request->ship_city,
    //         'zipcode' => $request->post_code,
    //         'paymentType' => 'Cash On Delivery',
    //         'paymentStatus' => 0,
    //         'unique_order_identifier' => generateRandomString(6),
    //         'order_date' => date("Y-m-d"),
    //     ]);

    //     $pro_rate = array_combine($productids,$product_rate);
    //     foreach($pro_rate as $pp_key => $pp_val) {
    //         // order_details
    //         $orderdetail = OrderDetailNew::insert([
    //             'orderId' => $order_new,
    //             'productId' => $pp_key,
    //             'qty' => 1,
    //             'rate' => $pp_val,
    //             ]);
    //     }


    //     $sids = array_unique($request->supplier_id);
    //     foreach ( $sids as $s ) 
    //     {
            
    //         $user = User::find($s);
    //         if ($user->profile) {
    //         session(['uemail' => $user->profile->email]);
    //         }else{
    //         session(['uemail' => $user->email]);
    //         }
    //         //Start Email
    //         // try {
    //         //     Mail::send('emails.orders.shipped', 
    //         //               [ 
    //         //                 'user_name' => $user->username, 
    //         //                 'clientname' => $request->username,
    //         //               ]
    //         //               , function ($message)
    //         //                 {

    //         //                     $message->from('sastoshowroom@gmail.com', 'Aryal Marketing');
    //         //                     $message->cc('nickarsenal007@gmail.com', $name = null);
    //         //                     $message->subject('Order Alert! Aryal Marketing');
    //         //                     $message->to(session()->get('uemail'));

    //         //                 });
    //         //   } catch (Exception $e) {   }
    //           sleep('1');
    //           session()->forget('uemail');
    //     }

    //     session()->flash('info', 'Thank you for placing your orders. We will contact you soon.');
    //     return redirect('/order-success');
    // }

    public function update_payment_status(Request $request){
        // dd($request);
        // OrderNew::where('id', $request->order_id )->update([ 'paymentStatus' => $request->payment_Status, 'paymentDate' => date("Y-m-d") ]);
        
        DB::table('payment_details')->where('payment_id', $request->order_id )->update([ 'status' => $request->payment_Status, 'payment_date' => date("Y-m-d") ]);
        
        session()->flash('info', 'Payment Status Updated');
        return redirect()->back();
    }
    
      public function store(Request $request)
    {
        // dd($request);die;
        $this->validateWith([
            'username' => 'required',
            'shippingAddress' => 'required',
            'user_email' => 'required',
            'number' => 'required',
            'product_id' => 'required'
        ]);

        $productids = $request->product_id;
        $supplierids = $request->supplier_id;
        $product_rate = $request->rate;

        $data = '';
        $orderId = 0;
        $returnid = 0;
        $uniqueOrderIdentifier = str_random(18);

        try {
         
            // Add shipping details
            // if ( $request->shippingAddress ) {
                
                // $shippingAddress = (object) $request->shippingAddress;

                $returnid = DB::table("shipping_details")->insertGetId([
                    'email' => $request->user_email,
                    'client_name' => $request->full_name,
                    'address' => $request->shippingAddress,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipcode' => $request->zipcode,
                    'phone' => $request->number,
                    'shipping_type_id' => $request->shippingTypeId,
                    'customer_id' => $request->orderedBy,
                ]);

            // }

            $paymentid = DB::table("payment_details")->insertGetId([
                'payment_method_id' => 1,
                'amount' => 0,
                'status' => 0,
            ]);

        } catch (Exception $exception) {
            $errormessage = $exception->getMessage();
        }

        try {
            
            // Order
            $order = new Order;

            // $order->order_date = date('Y-m-d', strtotime($request->orderDate));
            $order->order_date = date('Y-m-d');
            $order->shipping_details_id = $returnid;
            $order->payment_details_id = $paymentid;
            // $order->order_status = $request->orderStatus;
            $order->ordered_by = $request->orderedBy;
            $order->unique_order_identifier = $uniqueOrderIdentifier;

            $order->save();
            
            $orderId = $order->id;

        } catch (Exception $exception) {
            $errormessage = $exception->getMessage();

            // return $this->jsonResponse($data, 404, $errormessage);
        }

        try {
            
            $productIds = $request->product_id;
            $quantities = $request->quantities;

            if ( $productIds && $quantities ) {
                $comb = array_combine($productIds, $quantities);

                foreach ($comb as $p => $q) {
                    $rates = Product::find($p);
                    // Order Details
                    $OrderDetail = new OrderDetail;

                    $OrderDetail->product_id = $p;
                    $OrderDetail->order_id = $orderId;
                    $OrderDetail->quantity = $q;
                    $OrderDetail->rate = $rates->rate;

                    $OrderDetail->save();

                }

            }

        } catch (Exception $exception) {
            $errormessage = $exception->getMessage(); 
        }

        

        session()->flash('info', 'Thank you for placing your orders. We will contact you soon.');
        return redirect('/order-success');
    }

    public function store_khalti(Request $request)
    {
        // dd($request);die;
        // echo $request->username;
        $this->validateWith([
            'username' => 'required',
            'shippingAddress' => 'required',
            'user_email' => 'required',
            'number' => 'required',
            'product_id' => 'required'
        ]);

        $productids = $request->product_id;
        $supplierids = $request->supplier_id;
        $product_rate = $request->rate;

        $data = '';
        $orderId = 0;
        $returnid = 0;
        $uniqueOrderIdentifier = str_random(18);

        try {
         
            // Add shipping details
            // if ( $request->shippingAddress ) {
                
                // $shippingAddress = (object) $request->shippingAddress;

                $returnid = DB::table("shipping_details")->insertGetId([
                    'email' => $request->user_email,
                    'client_name' => $request->full_name,
                    'address' => $request->shippingAddress,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zipcode' => $request->zipcode,
                    'phone' => $request->number,
                    'shipping_type_id' => $request->shippingTypeId,
                    'customer_id' => $request->orderedBy,
                ]);

            // }

            $paymentid = DB::table("payment_details")->insertGetId([
                'payment_method_id' => 1,
                'amount' => $request->amount,
                'status' => 1,
            ]);

        } catch (Exception $exception) {
            $errormessage = $exception->getMessage();
        }

        try {
            
            // Order
            $order = new Order;

            // $order->order_date = date('Y-m-d', strtotime($request->orderDate));
            $order->order_date = date('Y-m-d');
            $order->shipping_details_id = $returnid;
            $order->payment_details_id = $paymentid;
            // $order->order_status = $request->orderStatus;
            $order->ordered_by = $request->orderedBy;
            $order->unique_order_identifier = $uniqueOrderIdentifier;

            $order->save();
            
            $orderId = $order->id;

        } catch (Exception $exception) {
            $errormessage = $exception->getMessage();

            // return $this->jsonResponse($data, 404, $errormessage);
        }

        try {
            
            $productIds = $request->product_id;
            $quantities = $request->quantities;

            if ( $productIds && $quantities ) {
                $comb = array_combine($productIds, $quantities);

                foreach ($comb as $p => $q) {
                    $rates = Product::find($p);
                    // Order Details
                    $OrderDetail = new OrderDetail;

                    $OrderDetail->product_id = $p;
                    $OrderDetail->order_id = $orderId;
                    $OrderDetail->quantity = $q;
                    $OrderDetail->rate = $rates->rate;

                    $OrderDetail->save();
                }
            }
        } catch (Exception $exception) {
            $errormessage = $exception->getMessage(); 
        }

        session()->flash('info', 'Thank you for placing your orders. We will contact you soon.');
        return redirect('/order-success');
    }


    public function verifyKhaltiPayment(Request $request){
        $args = http_build_query(array(
          'token' => $request->token,
          'amount'  => $request->amount
        ));

      $url = "https://khalti.com/api/payment/verify/";

      # Make the call using API.
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $headers = ['Authorization: Key test_secret_key_bda93b06439c41be99f5e8c4f8cb49bc'];
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      // Response
      $response = curl_exec($ch);
      $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);

    //   $returnid = DB::table("shipping_details")->insertGetId([
    //     'email' => 'hello',
    //     'client_name' => 'hello',
    //     'address' => 'hello',
    //     'city' => 'hello',
    //     'state' => 'hello',
    //     'zipcode' => '123',
    //     'phone' => '123',
    //     'shipping_type_id' => '1',
    //     'customer_id' => '2',
    // ]);

      $content = new Request();
        $content->full_name = $request->full_name;
        $content->username = $request->username;
        $content->shippingAddress = $request->shippingAddress;
        $content->user_email = $request->user_email;
        $content->number = $request->number;

        $content->state = $request->state;
        $content->city = $request->city;
        $content->zipcode = $request->zipcode;

        $content->product_id = $request->product_id;
        $content->rate = $request->rate;
        $content->supplier_id = $request->supplier_id;
        $content->quantities = $request->quantities;

        $content->orderedBy = $request->orderedBy;
        $content->shipmethod = $request->shipmethod;

        $content->amount = $request->amount;
        $this->store_khalti($content);
    //   $token = json_decode($response, TRUE);
    //   if (isset($token['idx'])&& $status_code == 200) 
    //   {
          // $khalti = $khalti->update(['status' => 1 , 'verified_token' => $token['idx']]);
          // return $this->jsonResponse($data, 200);
        //   $this->store();
        //   return true;
        //   return $this->jsonResponse($token['state'], 200, 'Successful.');
    //   }
    //   return false;
    //   return $this->jsonResponse($token['state'], 404, 'Already Verified.');

  }



    // public function store(Request $request)
    // {
    //     dd($request);die;
    //     $this->validateWith([
    //         'username' => 'required',
    //         'delivery_address' => 'required',
    //         'user_email' => 'required',
    //         'number' => 'required',
    //         'product_id' => 'required'
    //     ]);

    //     $productids = $request->product_id;
    //     $supplierids = $request->supplier_id;
    //     $product_rate = $request->rate;

    //     // shipping details
    //     $save_ship = DB::table("shipping_details")->insertGetId([
    //         'client_name' => $request->username,
    //         'address' => $request->ship_address,
    //         'city' => $request->ship_city,
    //         'state' => $request->ship_state,
    //         'zipcode' => $request->post_code,
    //         'phone' => $request->number,
    //         'shipping_type_id' => 1,
    //         'customer_id' => $request->customer_id,
    //     ]);
        
    //     // payment details
    //     $pmt_id = DB::table("payment_details")->insertGetId([
    //         'payment_method_id' => 1,
    //         'amount' => 0,
    //         // 'payment_date' => '',
    //         'status' => 0,
    //     ]);
        
    //     // generate unique code token
    //     function generateRandomString($length = 20) {
    //         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //         $charactersLength = strlen($characters);
    //         $randomString = '';
    //         for ($i = 0; $i < $length; $i++) {
    //             $randomString .= $characters[rand(0, $charactersLength - 1)];
    //         }
    //         return $randomString;
    //     }

    //     // orders
    //     $order = Order::insertGetId([
    //             'order_date' => date("Y-m-d"),
    //             'shipping_details_id' => $save_ship,
    //             'payment_details_id' => $pmt_id,
    //             'order_status' => '1',
    //             'ordered_by' => $request->customer_id,
    //             'unique_order_identifier' => generateRandomString(6),
    //     ]);


    //     $arr = array_combine($productids,$supplierids);
    //     foreach ($arr as $key => $value) {
    //       $ord = Orders::insert([
    //                 'product_id' => $key,
    //                 'user_id' => $value,
    //                 'name' => $request->username,
    //                 'user_email' => $request->user_email,
    //                 'phone' => $request->number,
    //                 'address' => $request->delivery_address,
    //       ]);
    //       if($ord){

    //       }
          

    //     }

    //     $pro_rate = array_combine($productids,$product_rate);
    //     foreach($pro_rate as $pp_key => $pp_val) {
    //         // order_details
    //         $orderdetail = OrderDetail::insert([
    //             'product_id' => $pp_key,
    //             'order_id' => $order,
    //             'quantity' => 1,
    //             'rate' => $pp_val,
    //             'discount' => 0,
    //             'total_amount' => $pp_val
    //             ]);
    //     }


    //     $sids = array_unique($request->supplier_id);
    //     foreach ( $sids as $s ) 
    //     {
            
    //         $user = User::find($s);
    //         if ($user->profile) {
    //         session(['uemail' => $user->profile->email]);
    //         }else{
    //         session(['uemail' => $user->email]);
    //         }
    //         //Start Email
    //         try {
    //             Mail::send('emails.orders.shipped', 
    //                       [ 
    //                         'user_name' => $user->name, 
    //                         'clientname' => $request->username,
    //                       ]
    //                       , function ($message)
    //                         {

    //                             $message->from('sastoshowroom@gmail.com', 'Aryal Marketing');
    //                             $message->cc('nickarsenal007@gmail.com', $name = null);
    //                             $message->subject('Order Alert! Aryal Marketing');
    //                             $message->to(session()->get('uemail'));

    //                         });
    //           } catch (Exception $e) {   }
    //           sleep('1');
    //           session()->forget('uemail');
    //     }

    //     session()->flash('info', 'Thank you for placing your orders. We will contact you soon.');
    //     return redirect()->back();
    // }

    public function order_success()
    {
        $title = 'Order Success';
        return view('theme5.order_success')->with('title', $title);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
