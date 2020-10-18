<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use Session;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        
        return view('brands.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $this->validateWith([
            'name' => 'required',
            'status' => 'required',
            'image' => 'image|required'
    ]);

    $brand = new Brand;

    $brand->brandName = $request->name;
    $brand->slug = str_slug($request->name);
    $brand->status = $request->status;

    $fileurl = '';
        if ( $featured = $request->file('image') ) {
            $filename = 'featured-' . str_slug( $request->name ) . '-' . str_random(10) . '.' . $featured->getClientOriginalExtension();

            Image::make($featured)->resize(250,270)->save('uploads/brands/'. $filename);

            $fileurl = 'uploads/brands/' . $filename; 
        }

    $brand->image = $fileurl;
    // $cat->theme_no = $request->theme_no;
    $brand->save();

    Session::flash('success', 'Succesfully created a Brand.');
    return redirect()->back();
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
        $brand = Brand::where('brandId', $id)->first();

        // dd($brand);
        return view('brands.edit')->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validateWith([
            'name' => 'required',
            'status' => 'required',
            'image' => 'image|required'
        ]);

        // $brand = Brand::where('brandId', $id)
        //                 ->update(['brandName'=> $request->name, 'slug' => str_slug($request->name), 'status'=> $request->status]);

        // $brands = Brand::latest()->get();
        
        $fileurl = $brand->image;
        if ( $featured = $request->file('image') ) {
            $filename = 'featured-' . str_slug( $request->name ) . '-' . str_random(10) . '.' . $featured->getClientOriginalExtension();

            try {
                if ( file_exists($brand->image) ) {
                    unlink( $brand->image );
                }    
            } catch (Exception $e) {
                
            }
            Image::make($featured)->resize(250,270)->save('uploads/brands/'. $filename);

            $fileurl = 'uploads/brands/' . $filename; 
        }


        $brand->brandName = $request->name;
        $brand->slug = str_slug($request->name);
        $brand->image = $fileurl;
        $brand->status = $request->status;
        // $category->theme_no = $request->theme_no;
        $brand->save();


        Session::flash('success', 'Succesfully Updated a Brand.');
        return redirect()->back();
        // return view('brands.index')->with('brands', $brands);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::where('brandId', $id);
        $brand->delete();

        Session::flash('success', 'Succesfully removed.');

        return redirect()->back();
    }
}
