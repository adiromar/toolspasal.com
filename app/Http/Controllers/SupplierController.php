<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profile = Auth::user()->profile;
        // dd($profile);
        return view('suppliers.create', compact('profile'));
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
                            'shopname' => 'required|bail',
                            'about_us' => 'required|bail',
                            'contactEmail' => 'required|bail',
                            'address' => 'required',
                            'featured_image' => 'required|image',
                            'phone' => 'required',
                        ]);


        //Upload file and get imagename
        $file = $request->file('featured_image');
        $filename = time() . '-' . str_slug($request->shopname) . '.'.$file->getClientOriginalExtension();
        
        $file->move('uploads/suppliers', $filename);

        $profile = new Supplier;

        $profile->user_id = Auth::id();
        $profile->detail = $request->shopname;
        $profile->about_us = $request->about_us;
        $profile->email = $request->contactEmail;
        $profile->address = $request->address;
        $profile->image = 'uploads/suppliers/' . $filename;
        $profile->phone = $request->phone;
        $profile->facebook_link = $request->facebook_link;
        $profile->viber = $request->viber;
        $profile->skype = $request->skype;
        $profile->wechat = $request->wechat;

        $profile->save();

        return redirect()->route('dashboard');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = DB::table('suppliers')->where('user_id', $id)->first();
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validateWith([
                            'shopname' => 'required|bail',
                            'about_us' => 'required|bail',
                            'contactEmail' => 'required|bail',
                            'address' => 'required',
                            'phone' => 'required',
                        ]);

        $profile = Supplier::findOrFail($id); 

        //Upload file and get imagename
        $file = $request->file('featured_image');
        $fileurl = $profile->image;
        if ( $file ) {
            
            $filename = time() . '-' . str_slug($request->shopname) . '.'.$file->getClientOriginalExtension();
        
            if ( file_exists($profile->image) ) {
                unlink($profile->image);
            }

            $file->move('uploads/suppliers', $filename);

            $fileurl = 'uploads/suppliers/' . $filename;

        }
        
        $profile->user_id = Auth::id();
        $profile->detail = $request->shopname;
        $profile->about_us = $request->about_us;
        $profile->email = $request->contactEmail;
        $profile->address = $request->address;
        $profile->image = $fileurl;
        $profile->phone = $request->phone;
        $profile->facebook_link = $request->facebook_link;
        $profile->viber = $request->viber;
        $profile->skype = $request->skype;
        $profile->wechat = $request->wechat;

        $profile->save();

        Session::flash('success', 'Succesfully updated.');

        return redirect()->route('dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
