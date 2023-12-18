<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Wishlist;
use Session;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    private $customer,$wishlist;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {    
        $this->wishlist= Wishlist::where('customer_id',Session::get('customer_id'))->get();
        return view('website.wishlist.index',[
            'products' => $this->wishlist
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if(Session::get('customer_id'))
        {
           $this->customer = Customer::find(Session::get('customer_id'));
        }
        else
        {
            return redirect()->route('login-register')->with('redirect','Please Login or Register to active this feature...');

        }
        $this->wishlist= Wishlist::where('customer_id',Session::get('customer_id'))->where('product_id',$request->id)->first();
        if($this->wishlist)
        {
        return back()->with('message','Already Added ...');
    }
        Wishlist::newWishlist($this->customer,$request);
        return redirect('/wishlist')->with('message',' Successfully Add..');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$product)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        Wishlist::deleteWishlist($wishlist);
        return back()->with('message','Wishlist Deleted Successfully');
    }
}
