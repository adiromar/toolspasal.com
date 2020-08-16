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
        return view('2.previewEdit', compact('title', 'previewEdit', 'categories','featured_products', 'products','tags','brands'));
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
        return view('theme2.wishlist', compact('products', 'title'));
    }

    public function user_orders($userId){
        $user = User::find($userId);
        $orders = Order::where('ordered_by', $userId)->paginate(20);
        
        dd($orders);
        return view('theme2.wishlist', compact('products', 'title'));
    }

    public function search_product(Request $request) {

        $this->validateWith([
            'search' => 'required',
        ]);

        $products = Product::where('productName', 'like', '%'.$request->search.'%')->paginate(9);

        $title = 'Search results for "' . $request->search . '"';
        return view('theme2.wishlist', compact('products', 'title'));

    }

    public function contact() {
        return view('theme2.contact');
    }

    public function privacy_policy() {
        return view('theme2.privacypolicy');
    }

    public function cart_view() {
        return view('theme2.cart');
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
	
}