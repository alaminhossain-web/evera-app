<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.offer.index',[
            'offers' => Offer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offer.add',[
            'products' => Product::where('status',1)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Offer::newOffer($request);
        return back()->with('message','Offer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        return view('admin.offer.edit',[
            'products' => Product::where('status',1)->get(),
            'offer' => $offer,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Offer $offer)
    {
        Offer::updateOffer($request,$offer);
        return redirect('/offer')->with('message','Offer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        Offer::deleteOffer($offer);
        return back()->with('message','Offer Deleted Successfully');
    }
}
