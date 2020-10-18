<?php

namespace App\Http\Controllers\Theme2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Product;
use App\Setting;
use App\Category;
use App\Tags;
use Auth;
use App\User;
use App\Order;
use DB;
use App\Brand;
use Session;

class FrontController extends Controller
{
	
	public function index() {
        $title = 'Toolspasal | Shop Products Online';
        $products = Product::where('featured', 0)
            ->orderBy('products.id','desc')->take(20)->get();

        $featured_products = Product::where('products.featured',1)
            ->orderBy('products.updated_at','desc')->take(12)->get();

        $setting = Setting::first();
        $previewEdit = 0;
        $categories = Category::orderBy('name')->get();
        $tags = Tags::orderBy('name')->get();
        $brands = Brand::latest()->get();

        return view('theme2.index', compact('title', 'previewEdit', 'categories','featured_products','products','tags','brands'));
        
  }
  
  public function previewEdit() {
    $title = 'Pathivarahardware | Shop Products Online';
		$products = Product::where('featured', 0)
                          ->orderBy('products.id','desc')->take(20)->get();

        $featured_products = Product::where('products.featured',1)
                          ->orderBy('products.updated_at','desc')->take(12)->get();
        $previewEdit = 1;
        $categories = Category::orderBy('name')->get();
        $tags = Tags::orderBy('name')->get();
        $brands = Brand::latest()->get();

        if(Auth::guest()){
            $previewEdit = 0;
            return view('theme2.index', compact('title', 'previewEdit', 'categories','featured_products','products','tags','brands'));
            
        }
		if( Auth::user()->roles()->first()->role == 'Admin' || Auth::user()->roles()->first()->role == 'Supplier') {
        return view('theme2.previewEdit', compact('title', 'previewEdit', 'categories','featured_products', 'products','tags','brands'));
        }else{
            $previewEdit = 0;
            return view('theme2.index', compact('title', 'previewEdit', 'categories','featured_products','products','tags','brands'));
        }
    }

    public function login_new() {
        $title = 'Login Form';

        return view('theme2.login')->with(['title' => $title]);
    }

    public function register_new() {
        $title = 'Register Form';

        return view('theme2.register')->with(['title' => $title]);
    }

    public function reset_password() {
        $title = 'Reset Password';

        return view('theme2.reset_password')->with(['title' => $title]);
    }

	public function get_products_by_category($slug){

        $id_get = Category::where('slug', $slug)->first();
        if( !$id_get ){
            return redirect()->route('index');
        }
        $id = $id_get->id;

        if (request()->sort == 'low_high') {
            $products = Category::find($id)->products()->orderBy('rate')->paginate(9);
        }elseif(request()->sort == 'high_low'){
            $products = Category::find($id)->products()->orderBy('rate', 'desc')->paginate(9);
        }elseif(request()->rating == 'low_high'){
            $products = Category::find($id)->products()
                ->with(['ratings' => function ($query){
                            $query->orderBy('rating');
                        }])->paginate(9);
        }elseif(request()->rating == 'high_low'){
            $products = Category::find($id)->products()
                ->with(['ratings' => function ($query){
                            $query->orderBy('rating', 'desc');
                        }])->paginate(9);
        }
        else{
            $products = Category::find($id)->products()->orderBy('productName')->paginate(9);
        }
        $catname = Category::find($id);
        $parentcategories = Category::where('parentId', 0)->get()->take(10);
        $title = 'Category: ' . $catname->name;
        return view('theme2.products')->with([
                                                'products' => $products,
                                                'categories' => Category::all(),
                                                'catname' => $catname,
                                                'title' => $title,
                                                'parentcategories' => $parentcategories
                                            ]);

    }

    public function get_all_featured(){


        if (request()->sort == 'low_high') {
            $products = Product::where('featured', 1)->orderBy('rate')->paginate(9);
        }elseif(request()->sort == 'high_low'){
            $products = Product::where('featured', 1)->orderBy('rate', 'desc')->paginate(9);
        }elseif(request()->rating == 'low_high'){
            $products = Product::where('featured', 1)->with(['ratings' => function ($query){
                            $query->orderBy('rating');
                        }])->paginate(9);
        }elseif(request()->rating == 'high_low'){
            $products = Product::where('featured', 1)->with(['ratings' => function ($query){
                            $query->orderBy('rating', 'desc');
                        }])->paginate(9);
        }
        else{
            $products = Product::where('featured', 1)->orderBy('productName')->paginate(9);
        }
        
        $title = 'Featured Products';
        return view('theme2.products')->with([
                                                'products' => $products,
                                                'title' => $title
                                            ]);
    }
    
    public function get_all_products_more(){
    
    
        if (request()->sort == 'low_high') {
            $products = Product::where('featured', 0)->orderBy('rate')->paginate(9);
        }elseif(request()->sort == 'high_low'){
            $products = Product::where('featured', 0)->orderBy('rate', 'desc')->paginate(9);
        }elseif(request()->rating == 'low_high'){
            $products = Product::where('featured', 0)->with(['ratings' => function ($query){
                            $query->orderBy('rating');
                        }])->paginate(9);
        }elseif(request()->rating == 'high_low'){
            $products = Product::where('featured', 0)->with(['ratings' => function ($query){
                            $query->orderBy('rating', 'desc');
                        }])->paginate(9);
        }
        else{
            $products = Product::where('featured', 0)->orderBy('productName')->paginate(9);
        }
        
        $title = 'View All Products';
        return view('theme2.products')->with([
                                                'products' => $products,
                                                'title' => $title
                                            ]);
    }

    public function get_all_products_brands($id){
    
    
        if (request()->sort == 'low_high') {
            $products = Product::where('brand_id', $id)->orderBy('rate')->paginate(9);
        }elseif(request()->sort == 'high_low'){
            $products = Product::where('brand_id', $id)->orderBy('rate', 'desc')->paginate(9);
        }elseif(request()->rating == 'low_high'){
            $products = Product::where('brand_id', $id)->with(['ratings' => function ($query){
                            $query->orderBy('rating');
                        }])->paginate(9);
        }elseif(request()->rating == 'high_low'){
            $products = Product::where('brand_id', $id)->with(['ratings' => function ($query){
                            $query->orderBy('rating', 'desc');
                        }])->paginate(9);
        }
        else{
            $products = Product::where('brand_id', $id)->paginate(9);
        }
        
        $brandname = Brand::where('brandId', $id)->first();
        $title = 'Brand: ' . $brandname->brandName;
        return view('theme2.products')->with([
                                                'products' => $products,
                                                'title' => $title
                                            ]);
    }


    

    public function view_product( $slug ) {

        $product = Product::where('slug', $slug)->firstOrFail();
        if (empty($product)) {
            return redirect()->route('index');
        }
        $cat_id = $product->categoryId;
        $category = Category::find($cat_id);
        $ratings = $product->ratings()->select('rating')->get();
        $averageRating = collect($ratings)->avg('rating');

        $productsOfCategory = '';
        $productReviews = '';
        $productsOfCategory = Product::latest()->where('categoryId', $cat_id)->where('id', '!=', $product->id)->get()->take(4);
        $productReviews = $product->reviews()->orderBy('created_at')->get();

        $relatedproducts = Product::where('categoryId', $cat_id)->where('id', '!=', $product->id)->inRandomOrder()->get()->take(4);
        
        return view('theme2.single')->with([
                                                'product'=> $product,
                                                'productsOfCategory' => $productsOfCategory,
                                                'productReviews' => $productReviews,
                                                'averageRating' => $averageRating,
                                                'category' => $category,
                                                'relatedproducts' => $relatedproducts
                                                ]);
    }

    public function view_product_id( $id ) {

        $product = Product::where('id', $id)->firstOrFail();
        if (empty($product)) {
            return redirect()->route('index');
        }
        $cat_id = $product->categoryId;
        $category = Category::find($cat_id);
        $ratings = $product->ratings()->select('rating')->get();
        $averageRating = collect($ratings)->avg('rating');

        $productsOfCategory = '';
        $productReviews = '';
        $productsOfCategory = Product::latest()->where('categoryId', $cat_id)->where('id', '!=', $product->id)->get()->take(4);
        $productReviews = $product->reviews()->orderBy('created_at')->get();

        $relatedproducts = Product::where('categoryId', $cat_id)->where('id', '!=', $product->id)->inRandomOrder()->get()->take(3);
        
        return view('theme2.single')->with([
                                                'product'=> $product,
                                                'productsOfCategory' => $productsOfCategory,
                                                'productReviews' => $productReviews,
                                                'averageRating' => $averageRating,
                                                'category' => $category,
                                                'relatedproducts' => $relatedproducts
                                                ]);
    }
    
    public function wishlist($userId)
    {
        $user = User::find($userId);
        $wishlist = $user->wishlists()->where('deleted', 0)->get()->pluck('productId')->toArray();
        
        $products = Product::wherein('id', $wishlist)->paginate(9);

        $title = 'Your Wish List';

        return view('theme2.cart', compact('products', 'title'));
    }

    public function user_orders($userId){
        $user = User::find($userId);
        
        if(Auth::id() == $userId){
        
            $orders = Order::where('ordered_by', $userId)->paginate(20);

            $data = $collection = $pay = [];
            foreach ($orders as $ord) {
                
                $data[] = $this->getOrderDetails_user($ord->id);
                
                $collection = collect([
                    $data
                ]);
            }
            
            // foreach ($data as $d) {
            //     foreach ($d as $val) {
            //         echo $val['productName'];
            //     }
            // }
            
            dd($data);
            
            $title = 'Your Orders';
            return view('theme2.user_orders', compact('orders','data','title', 'pay'));
        }else{
            return redirect('/');
        }
        
    }

    public function search_product(Request $request) {

        $this->validateWith([
            'search' => 'required',
        ]);

        $products = Product::where('productName', 'like', '%'.$request->search.'%')->paginate(9);

        $title = 'Search results for "' . $request->search . '"';
        return view('theme2.search', compact('products', 'title'));

    }

    public function contact() {
        return view('theme2.contact');
    }

    public function privacy_policy() {
        return view('theme2.privacypolicy');
    }

    public function cart_view() {
        $title = 'Your Cart';
        return view('theme2.cart', compact('title'));
    }

    public function checkout_view() {
        return view('theme2.checkout');
    }

    public function about_us() {
        return view('theme2.aboutus');
    }

    public function privacy_policy_app() {
        return view('theme2.privacy_policy_app');
    }

    public function getOrderDetails_user($orderId)
    {

        $data = $this->orderDTO_new($orderId);
        
        if ( $data ) {
            
            return $data;
        }

        return false;
    }

    private function orderDTO_new($orderId)
    {
        $selections = [
                        'id as orderId', 
                        // 'order_details.product_id as productId', 
                        'order_date as orderDate', 
                        'order_status as orderStatus',
                        'shipping_details_id as shippingDetailsId',
                        'payment_details_id as paymentDetailsId',
                        'ordered_by as orderedBy',
                        // 'quantity as quantities',
                        // 'order_details.order_details_id as orderDetailsId'
                    ];

        $order = Order::select($selections)
                        // ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                        ->where('orders.id', $orderId)
                        ->get();

                        $data = [];
                        
                        foreach ($order as $o) {
                            $det = $this->detailDTO($o->orderId);
                            $ship = $this->shipDTO($o->shippingDetailsId);

                            dd($ship);
                            $data['order_date'] = $o->order_date;
                            $data['order_status'] = $o->order_status;
                            $data['client_name'] = $ship->client_name;
                            foreach ($det as $oo) {
                                $data[] = $this->productDTO_new($oo->product_id);
                            }
                            
                        }
        return $data;
    }

    public function detailDTO($id){
        $val = DB::table('order_details')->where('order_details_id', $id)->get();

        return $val;
    }

    public function shipDTO($id){
        $val = DB::table('shipping_details')->where('shipping_details_id', $id)->get();

        return $val;
    }

    public function productDTO_new($productId, $qty = '')
    {

        $selections = ['id', 'productName', 'unit', 'rate', 'categoryId', 'categoryName', 'availableItems', 'parentId', 'featuredImage', 'shortDesc', 'highlights', 'description', 'entryDate', 'quantity', 'featured', 'user_id as userId', 'newProduct', 'merchantId', 'discountPercent', 'actualRate', 'created_at'];

        $product = Product::where('id', $productId)->select($selections)->first();

        $product->featuredImage = url('/') . '/uploads/products/' . $product->featuredImage;
        
        $data = [];

        $data['productId'] = $product->id;
        $data['productName'] = $product->productName;
        $data['unit'] = $product->unit;
        $data['rate'] = (float) $product->rate;
        $data['categoryId'] = $product->categoryId;
        $data['categoryName'] = $product->categoryName;
        $data['availableItems'] = $product->availableItems;
        $data['parentId'] = $product->parentId;

        // Images here
        $data['images'][0]['imageId'] = 1;
        $data['images'][0]['image'] = $product->featuredImage;

        $i = 1;
        if ( count($product->images) ) {
            foreach ($product->images as $img) {
                
                $data['images'][$i]['imageId'] = $i + 1;
                $data['images'][$i]['image'] = url('/') . '/uploads/products/' . $img->image;

                $i++;
            }
        }

        $data['shortDesc'] = $product->shortDesc;
        $data['highlights'] = $product->highlights;
        $data['description'] = $product->description;
        $data['entryDate'] = $product->created_at->format('Y-m-d H:g:s');

        
        $data['quantity'] = $qty;
        
        $data['featured'] = $product->featured ? true : false;
        $data['userId'] = $product->userId;
        // $data['orderQuantity'] = $qty;

        $data['newProduct'] = $product->newProduct ? true : false;
        $data['discountPercent'] = (float) $product->discountPercent;
        $data['actualRate'] = $product->actualRate;
        $data['merchantId'] = (int) $product->merchantId;
        $data['merchant'] = [];

        //Get reviews
        $reviews = [];
        if ( count($product->reviews) ) {
            
            foreach ($product->reviews()->select('id')->get() as $review) {
                $data['reviewDtos'][] = $this->reviewsDto($review->id);
            }

        }else{
            $data['reviewDtos'] = [];    
        }

        //No of reviews
        $data['nosReview'] = $product->reviews()->count();

        // avgRating
        $avgRating = $product->reviews()->avg('rating');
        $data['avgRating'] = $avgRating ? $avgRating : 0;

        // ancestorCategories 
        $ancestorCategories = Category::find($product->categoryId);
        // First current category
        $data['ancestorCategories'][] = $this->categoryDTO($product->categoryId);
        // Then parent category
        if ( $ancestorCategories->parentId != 0 ) {
            $data['ancestorCategories'][] = $this->categoryDTO($ancestorCategories->parentId);
        }else{
            $data['ancestorCategories'] = [];
        }

        $data['totalSoldQuantity'] = 0;
        $data['productTags'] = $product->tags()->pluck('name')->toArray();

        return $data;
    }

    private function categoryDTO($categoryId)
    {

        $selections = ['id as categoryId', 'name as categoryName', 'parentId', 'image', 'featured', 'offered'];

        $category = Category::select($selections)->where('id', $categoryId)->first();

        $category->image = url('/') . '/' . $category->image;
        $category->featured = $category->featured ? true : false;
        $category->offered = $category->offered ? true : false;

        if ( $category ) {
            return $category;
        }         

        return [];
    }

    public function extraDetails($orderId){
        $selections = [
                        'id as orderId', 
                        'payment_details.amount as totalCost',
                        'shipping_details.client_name as customerName',
                        'shipping_details.email as customerEmail',
                        'shipping_details.address as customerAddress',
                        'shipping_details.phone as customerPhoneNo',
                        'payment_details.status as paymentStatus',
                    ];

        $order = Order::select($selections)
                        // ->join('order_details', 'order_details.order_id', '=', 'orders.id')
                        ->join('payment_details', 'payment_details.payment_id', '=', 'orders.payment_details_id')
                        ->join('shipping_details', 'shipping_details.shipping_details_id', '=', 'orders.shipping_details_id')
                        ->where('orders.id', $orderId)
                        ->first();

        $total_cost = DB::table('order_details')->select('quantity', 'rate')->where('order_id', $orderId)->get();
        if($total_cost){
            $cc = 0;
            foreach ($total_cost as $val) {
                $price = $val->quantity * $val->rate;
                $cc += $price;
            }
        }else{
            $cc = 0;
        }
        

        $pay = 0;
        if($order){
            if($order->paymentStatus == 1){
                $pay = 'Paid';
            }elseif($order->paymentStatus == 0){
                $pay = 'Pending';
            }else{
                $pay = 'N/A';
            }

            $data['orderId'] = $order->orderId;
            $data['customerName'] = $order->customerName;
            $data['customerEmail'] = $order->customerEmail;
            $data['customerAddress'] = $order->customerAddress;
            $data['customerPhoneNo'] = (string) $order->customerPhoneNo;
            $data['paymentStatus'] = $pay;
            $data['totalCost'] = (string) $cc;

        }else{
            $data = '';
        }
        return $data;
    }

	
}