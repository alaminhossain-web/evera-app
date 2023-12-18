<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Session;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer,$order,$orderDetail;
    public function index() 
    {
        $this->customer = '';
        if(Session::get('customer_id'))
        {
            $this->customer = Customer::find(Session::get('customer_id'));
        }
        return view('website.checkout.index',[
            'customer' =>$this->customer
        ]);
    }
    public function newOrder(Request $request)
    {
        $this->customer = Customer::where('email',$request->email)->orWhere('mobile',$request->mobile)->first();
        if(!$this->customer)
        {
            Customer::newCustomer($request);
        }
        Session::put('customer_id',$this->customer->id);
        Session::put('customer_name',$this->customer->name);


        

        foreach(Cart::content() as $item)
        {
            $this->orderDetail = new OrderDetail;
            $this->orderDetail->order_id        = $this->order->id;
            $this->orderDetail->product_id      = $item->id;
            $this->orderDetail->product_name    = $item->name;
            $this->orderDetail->product_color   = $item->options->color;
            $this->orderDetail->product_size    = $item->options->size;
            $this->orderDetail->product_price   = $item->price;
            $this->orderDetail->product_qty     = $item->qty;
            $this->orderDetail->save();

            Cart::remove($item->rowId);
        }

        return redirect('/complete-order')->with('message','Congratulation...Your order post successfully.Please check your email and wait we will contact with you soon.');
    }
    public function completeOrder()
    {
        return view('website.checkout.complete-order');
    }
}
